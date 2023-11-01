<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Category;
use App\GVersion;
use App\Popular;
use App\Post;
use App\Suggest;
use App\Software;
use Illuminate\Support\Facades\DB;
use App\RequestApp;
use App\SaveGame;
use App\Comment;
use App\Message;
use App\Adult;
use App\Account;
use App\Skin;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController as ResponseController;

class ApiController extends ResponseController
{
    public function getUser(Request $request)
    {
        //$id = $request->user()->id;
        $user = $request->user();
        $games = DB::table('save_games')
            ->join('posts', 'save_games.post_id', '=', 'posts.id')
            ->where('save_games.user_id', $user->id)
            ->get();
        $messages = Message::where('user_id', $user->id)->latest()->get();
        foreach ($games as $g) {
            $logo = $g->logo;
            $g->logo = asset("storage/logo/" . $logo);
        }
        $user->games = $games;
        $user->messages = $messages;

        if ($user) {
            return $this->sendResponse($user);
        } else {
            $error = "user not found";
            return $this->sendResponse($error);
        }
    }

// games api  resources


    public function reportGame(Request $request)
    {
        try {
            $request->validate([
                "selectedOption" => "required|max:30",
                "post_id" => "required|max:30",
                "type" => "required|max:30",
            ]);
            $user = $request->user();
            $finish='မင်္ဂလာပါ ၂၄ နာရီအတွင်းမှာ ယခုလင့်ကို ပြန်ပြင်ပေးသွားမှာဖြစ်ပါတယ်....';
            $suggest = new Suggest();
            // $suggest->type = "game";
            
            $suggest->error_type = $request->selectedOption;
            $suggest->user_id=$user->id;
            $suggest->type=$request->type;
            if($request->type=='game'){
                $suggest->post_id = $request->post_id;
                if(Suggest::where('post_id', $request->post_id)->where('user_id',$user->id)->doesntExist()){
                    $suggest->save();
                }
            }elseif($request->type=='adult'){
                $suggest->adult_id = $request->post_id;
                if(Suggest::where('adult_id', $request->post_id)->where('user_id',$user->id)->doesntExist()){
                    $suggest->save();
                }
            }
            
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'finish' => $finish,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function getCategory()
    {
        try {
            $category = Category::orderBy('updated_at', 'desc')->get(['title', 'id']);
            foreach ($category as $c) {
                $c->count = Category::find($c->id)->posts()->count();
            }
            $count = Post::count();
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'category' => $category,
                'count' => $count,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }


    public function getPopularGames()
    {
        try {
            $games = Post::with('getCategory')->orderBy('created_at')->limit(20)->get();
            foreach ($games as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
                $g->category = $g->getCategory()->first('title')->title;
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public  function getGameDetails(Request $request)
    {
        try {
            $game = Post::where('slug', $request->slug)->with('getCategory')->with('getComment')->with('categories:post_id,title')->first();
            $logo = $game->logo;
            $game->logo = asset("storage/logo/" . $logo);
            $game->username = $game->getUser->name;
            $game->photos = array_map(function ($photo) {
                return asset("storage/post/" . $photo["name"]);
            }, $game->getPhoto()->get()->toArray());
            $game->category = $game->getCategory()->first('title')->title;
            $game->addHidden(["getPhoto"]);
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'game' => $game
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function getRelatedGames(Request $request)
    {
        try {
            $related_games = Post::where('category_id', $request->id)->limit(8)->inRandomOrder()->get();
            foreach ($related_games as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'related_games' => $related_games
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get related games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function getAllGames()
    {
        try {
            $title = 'All';
            $games = Post::where('category_id', '!=', '20')->orderBy('updated_at', 'desc')->paginate(15);
            foreach ($games as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
                $g->category = $g->getCategory()->first('title')->title;
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games,
                'title' => $title
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function getAllGamesByCategory($category_id)
    {
        try {
            $title = Category::where('id', $category_id)->first('title')->title;
            $games = Category::find($category_id)->posts()->orderBy('updated_at', 'desc')->paginate(15);
            foreach ($games as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
                $g->category = $g->getCategory()->first('title')->title;
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games,
                'title' => $title
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function searchGames($search_value)
    {
        try {
            $title = "Search";
            $games = Post::where('keywords', 'LIKE', "%{$search_value}%")->latest()->paginate(20);
            foreach ($games as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games,
                'title' => $title,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function requestGame(Request $request)
    {
        try {
            $request->validate([
                "app_name" => "required|max:50",
                "username" => "required|max:150",
                "phone" => "required|max:50",
                "description" => "required|max:200",
                "playstore_link" => "max:100",
            ]);
            $finish = 'မင်္ဂလာပါ ' . $request->username . 'ရေ.... မကြာခင်မှာ တောင်းဆိုထားတဲ့ ' . $request->app_name . ' ဂိမ်းကို စစ်ဆေးပီး ဆောင်ရွက်ပေးပါမယ်....';
            $requestApp = new RequestApp();
            $requestApp->app_name = $request->app_name;
            $requestApp->username = $request->username;
            $requestApp->phone = $request->phone;
            $requestApp->description = $request->description;
            $requestApp->playstore_link = $request->playstore_link;
            $requestApp->save();
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'finish' => $finish
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to request game!',
                'message_detail' => $e->validator->errors(),
            ], 500);
        }
    }
    public function saveGame(Request $request)
    {
        try {
            $request->validate([
                'post_id' => 'required|max:10',
            ]);
            $user = $request->user();

            $game = SaveGame::firstOrCreate([
                'post_id' => $request->post_id,
                'user_id' => $user->id,
            ]);

            $message = Post::find($request->post_id)->name . 'ဂိမ်းအား သိမ်းထားလိုက်ပါပြီ';
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'success' => $message
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to request game!',
                'message_detail' => $e->validator->errors(),
            ], 500);
        }
    }
    public function saveGameComment(Request $request)
    {
        try {
            $request->validate([
                'post_id' => 'required|max:10',
                'comment' => 'required|max:300'
            ]);
            $user = $request->user();
            $comment = Comment::Create([
                'post_id' => $request->post_id,
                'comment' => $request->comment,
                'user_id' => $user->id,
                'username' => $user->name
            ]);

            return response()->json([
                'result' => 1,
                'message' => 'success',
                'success' => 'comment created',
                'comment' => $comment
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to request game!',
                'message_detail' => $e->validator->errors(),
            ], 500);
        }
    }
    public function deleteGame(Request $request)
    {
        try {
            $request->validate([
                'post_id' => 'required|max:10',
                'user_id' => 'required|max:10',
            ]);

            $game = SaveGame::where('post_id', $request->post_id)->first();
            $game->delete();
            return response()->json([
                'result' => 1,
                'message' => 'success',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to delete game!',
                'message_detail' => $e->validator->errors(),
            ], 500);
        }
    }

// software api  resources
    public function getAllSoftwares()
    {
        try {
            $softwares = Software::orderBy('updated_at', 'desc')->paginate(20);
            foreach ($softwares as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/slogo/" . $logo);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'softwares' => $softwares,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all softwares!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function getSoftwareDetails($slug)
    {
        try {
            $software = Software::where('slug', $slug)->first();
            $logo = $software->logo;
            $software->logo = asset("storage/slogo/" . $logo);
            $software->username = $software->getUser->name;
            $software->photos = array_map(function ($photo) {
                return asset("storage/software/" . $photo["name"]);
            }, $software->getPhoto()->get()->toArray());
            $software->addHidden(["getPhoto"]);
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'software' => $software
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get software detail!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function searchSoftwares($search_value)
    {
        try {
            $softwares = Software::where('name', 'LIKE', "%{$search_value}%")->orderBy('name')->paginate(20);
            foreach ($softwares as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/slogo/" . $logo);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'softwares' => $softwares,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all softwares!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAllAdults()
    {
        try {
            $adults = Adult::orderBy('updated_at', 'desc')->paginate(15);
            foreach ($adults as $g) {
                $logo = $g->logo;
                $g->logo = "http://mgmm.pao666.net/storage/logo/". $logo;
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'adults' => $adults,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all adults!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAdultDetails($slug)
    {
        try {
            $adult = Adult::where('slug', $slug)->first();
            $logo = $adult->logo;
            $adult->logo = "http://mgmm.pao666.net/storage/logo/".$logo;
            $adult->username = "Thura Min Htin";
            $adult->photos = array_map(function ($photo) {
                return "http://mgmm.pao666.net/storage/post/".$photo["name"];
            }, $adult->getPhoto()->get()->toArray());
            $adult->addHidden(["getPhoto"]);
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'adult' => $adult
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get adult detail!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function searchAdults($search_value)
    {
        try {
            $adults = Adult::where('name', 'LIKE', "%{$search_value}%")->latest()->paginate(20);
            foreach ($adults as $g) {
                $logo = $g->logo;
                $g->logo = "http://mgmm.pao666.net/storage/logo/". $logo;
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'adults' => $adults,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all adults!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAllAccounts()
    {
        try {
            $accounts = Account::orderBy('updated_at', 'desc')->paginate(15);
            foreach ($accounts as $g) {
                $profile = $g->profile;
                $g->profile = asset("storage/profile/" . $profile);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'accounts' => $accounts,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all accounts!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAccountDetails($id)
    {
        try {
            $account = Account::where('id', $id)->first();
            $profile = $account->profile;
            $account->profile = asset("storage/profile/" . $profile);
            $account->skins = array_map(function ($photo) {
                return "https://modgamesmm.com/storage/skin/".$photo["url"];
            }, $account->skins()->get()->toArray());
            $account->photos = array_map(function ($photo) {
                return asset("storage/skins/" . $photo["name"]);
            }, $account->getPhoto()->get()->toArray());
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'account' => $account
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get account detail!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function searchAccounts($search_value)
    {
        try {
            $accounts = Account::where('name', 'LIKE', "%{$search_value}%")->latest()->paginate(20);
            foreach ($accounts as $g) {
                $profile = $g->profile;
                $g->profile =asset("storage/profile/" . $profile);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'accounts' => $accounts,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all accounts!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

   

    // dont't use code here below because it will be overwritten in the above
    public function allGames(Request $request)
    {
        try {
            $title = 'ဂိမ်းအားလုံး';
            $games = Post::orderBy('description', 'asc')->paginate(12);
            if ($request->page > 0) {
                return response()->json([
                    'result' => 1,
                    'message' => 'success',
                    'games' => $games,
                    'title' => $title
                ], 201);
            }
            // $games=Post::withCount(['getViewer'])->with('categories:post_id,title')->latest()->paginate(10);
            // foreach ($games as $g){
            //     $logo = $g->logo;
            //     $g->logo = asset("storage/logo/".$logo);
            //     $g->photos = array_map(function($photo){
            //         return asset("storage/post/".$photo["name"]);
            //     },$g->getPhoto()->get()->toArray());
            //      $g->category=$g->getCategory()->first('title')->title;
            //     $g->addHidden(["getPhoto"]);
            // }
            // return response()->json([
            //     'result' => 1,
            //     'message' => 'success',
            //     'games' => $games
            // ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function gameListFilter($id, Request $request)
    {

        try {
            if ($id == 10) {
                return redirect('http://mgmm.pao666.net/game/' . $id);
            } else {
                $c_name = Category::where('id', $id)->first()->title;
                $title = $c_name . ' ဂိမ်းများs';
                // $games=Post::where('category_id',$id)->latest()->paginate(12);
                $games = Category::find($id)->posts()->paginate(12);
                if ($request->page > 0) {
                    return response()->json([
                        'result' => 1,
                        'message' => 'success',
                        'games' => $games,
                        'title' => $title
                    ], 201);
                }
                // return view('games',compact('games','title'));
            }
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function byCategory($id)
    {
        try {
            $games = Post::withCount(['getViewer'])->where('category_id', $id)->with('categories:post_id,title')->latest()->paginate(10);
            foreach ($games as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
                $g->photos = array_map(function ($photo) {
                    return asset("storage/post/" . $photo["name"]);
                }, $g->getPhoto()->get()->toArray());
                $g->category = $g->getCategory()->first('title')->title;
                $g->addHidden(["getPhoto"]);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get game!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function relatedGames($id)
    {
        try {
            $games = Post::where('category_id', $id)->with('categories:post_id,title')->latest()->paginate(5);
            foreach ($games as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
                $g->photos = array_map(function ($photo) {
                    return asset("storage/post/" . $photo["name"]);
                }, $g->getPhoto()->get()->toArray());
                $g->category = $g->getCategory()->first('title')->title;
                $g->addHidden(["getPhoto"]);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get related game!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function ads()
    {
        try {
            $ads = Ads::latest()->get();
            foreach ($ads as $g) {
                $logo = $g->photo;
                $g->photo = asset("storage/ads/" . $logo);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'ads' => $ads
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get ads!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function version()
    {
        try {
            $version = GVersion::latest()->first();
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'version' => $version
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get version!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function search(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|max:50",
            ]);
            $name = $request->name;
            $games = Post::query()
                ->where('name', 'LIKE', "%{$name}%")
                ->with('categories:post_id,title')->latest()->paginate(10);
            foreach ($games as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
                $g->photos = array_map(function ($photo) {
                    return asset("storage/post/" . $photo["name"]);
                }, $g->getPhoto()->get()->toArray());
                $g->category = $g->getCategory()->first('title')->title;
                $g->addHidden(["getPhoto"]);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular games!',
                'message_detail' =>  $e->validator->errors(),
            ], 500);
        }
    }
    public function news()
    {
        try {
            $news = Popular::orderBy('updated_at', 'desc')->paginate(10);
            foreach ($news as $g) {
                $logo = $g->logo;
                $g->logo = asset("storage/logo/" . $logo);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'news' => $news
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function new($id)
    {
        try {
            $new = Popular::find($id);
            $logo = $new->logo;
            $new->logo = asset("storage/logo/" . $logo);
            $new->photos = array_map(function ($photo) {
                return asset("storage/popular/" . $photo["name"]);
            }, $new->getPhoto()->get()->toArray());
            $new->addHidden(["getPhoto"]);

            return response()->json([
                'result' => 1,
                'message' => 'success',
                'new' => $new
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get game!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    //    public function gameList(){
    //        $title='All Games List';
    //        $games=Post::latest()->paginate(12);
    ////        return $games;
    //        return view('games',compact('games','title'));
    //    }


    //    public function showComment($id){
    //        $post=Post::where('id',$id)->get();
    //        return view('comment.show',compact('post'));
    //    }


    //    public function storeRating(Request $request)
    //    {
    //        $request->validate([
    //            "post_id"=>"required|numeric",
    //            "rating"=>"required|numeric",
    //        ]);
    //        $rating=new Rating();
    //        $rating->post_id=$request->post_id;
    //        $rating->rating=$request->rating;
    //        $rating->save();
    //
    //        return redirect()->back();
    //    }
    //    public function storeComment(Request $request)
    //    {
    //        $request->validate([
    //            "post_id"=>"required|numeric",
    //            "comment"=>"required|max:120",
    //        ]);
    //        $comment=new Comment();
    //        $comment->post_id=$request->post_id;
    //        $comment->comment=$request->comment;
    //        $comment->save();
    //
    //        return redirect()->back();
    //    }

    //    public function test($id){
    ////        $post=Post::findOrFail($id);
    ////        return $post->categories()->paginate(2);
    //        $category=Category::findOrFail($id);
    //        return $category->posts()->paginate(2);
    //    }



    //            $g->photos_thumbnail = array_map(function($photo){
    //                return asset("storage/thumbnail/".$photo["name"]);
    //            },$g->getPhoto()->get()->toArray());
}
