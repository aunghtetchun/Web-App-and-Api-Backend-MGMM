<?php

namespace App\Http\Controllers;

use App\Ads;
use App\Category;
use App\Comment;
use App\GVersion;
use App\Popular;
use App\Post;
use App\Rating;
use App\RequestApp;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('ApiKey');
    }
    public function category(){
        try {
            $category=Category::orderBy('updated_at','desc')->get(['title','id']);
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'category' => $category
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function popularGames(){
        try {
            $games=Post::withCount(['getViewer'])->orderBy('get_viewer_count','desc')->with('getCategory')->with('categories:post_id,title')->limit(10)->get();
            foreach ($games as $g){
                $logo = $g->logo;
                $g->logo = asset("storage/logo/".$logo);
                $g->photos = array_map(function($photo){
                    return asset("storage/post/".$photo["name"]);
                },$g->getPhoto()->get()->toArray());
                $g->category=$g->getCategory()->first('title')->title;
                $g->addHidden(["getPhoto"]);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function allGames(){
        try{
            $games=Post::withCount(['getViewer'])->with('categories:post_id,title')->latest()->paginate(10);
            foreach ($games as $g){
                $logo = $g->logo;
                $g->logo = asset("storage/logo/".$logo);
                $g->photos = array_map(function($photo){
                    return asset("storage/post/".$photo["name"]);
                },$g->getPhoto()->get()->toArray());
                 $g->category=$g->getCategory()->first('title')->title;
                $g->addHidden(["getPhoto"]);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get all games!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function byCategory($id){
        try {
            $games=Post::withCount(['getViewer'])->where('category_id',$id)->with('categories:post_id,title')->latest()->paginate(10);
            foreach ($games as $g){
                $logo = $g->logo;
                $g->logo = asset("storage/logo/".$logo);
                $g->photos = array_map(function($photo){
                    return asset("storage/post/".$photo["name"]);
                },$g->getPhoto()->get()->toArray());
                 $g->category=$g->getCategory()->first('title')->title;
                $g->addHidden(["getPhoto"]);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);


        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get game!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function relatedGames($id){
        try {
            $games=Post::withCount(['getViewer'])->where('category_id',$id)->with('categories:post_id,title')->latest()->paginate(5);
            foreach ($games as $g){
                $logo = $g->logo;
                $g->logo = asset("storage/logo/".$logo);
                $g->photos = array_map(function($photo){
                    return asset("storage/post/".$photo["name"]);
                },$g->getPhoto()->get()->toArray());
                 $g->category=$g->getCategory()->first('title')->title;
                $g->addHidden(["getPhoto"]);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get related game!',
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
//            "phone" => "required|max:50",
                "description" => "required|max:500",
                "playstore_link" => "max:100",
            ]);
            $finish='Hi '.$request->username .' We will check your requested '.$request->app_name.' game soon. ....';
            $requestApp=new RequestApp();
            $requestApp->app_name=$request->app_name;
            $requestApp->username=$request->username;
            $requestApp->phone='00099000';
            $requestApp->description=$request->description;
            $requestApp->playstore_link=$request->playstore_link;
            $requestApp->save();
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'finish' => $finish
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get related game!',
                'message_detail' => $e->validator->errors(),
            ], 500);
        }
    }

    public function ads(){
        try {
            $ads=Ads::latest()->get();
            foreach ($ads as $g){
                $logo = $g->photo;
                $g->photo = asset("storage/ads/".$logo);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'ads' => $ads
            ], 201);

        }catch(\Exception $e){
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
            $version=GVersion::latest()->first();
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'version' => $version
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get version!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }

    public function search(Request $request){
        try {
            $request->validate([
                "name" => "required|max:50",
            ]);
            $name=$request->name;
            $games=Post::query()
                ->where('name', 'LIKE', "%{$name}%")
                ->with('categories:post_id,title')->latest()->paginate(10);
            foreach ($games as $g){
                $logo = $g->logo;
                $g->logo = asset("storage/logo/".$logo);
                $g->photos = array_map(function($photo){
                    return asset("storage/post/".$photo["name"]);
                },$g->getPhoto()->get()->toArray());
                $g->category=$g->getCategory()->first('title')->title;
                $g->addHidden(["getPhoto"]);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'games' => $games
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular games!',
                'message_detail' =>  $e->validator->errors(),
            ], 500);
        }
    }
    public function news(){
        try {
            $news=Popular::orderBy('updated_at','desc')->paginate(10);
            foreach ($news as $g){
                $logo = $g->logo;
                $g->logo = asset("storage/logo/".$logo);
            }
            return response()->json([
                'result' => 1,
                'message' => 'success',
                'news' => $news
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'result' => 0,
                'message' => 'Fail to get popular!',
                'message_detail' => $e->getMessage(),
            ], 500);
        }
    }
    public function new($id){
        try {
            $new=Popular::find($id);
            $logo = $new->logo;
            $new->logo = asset("storage/logo/".$logo);
            $new->photos = array_map(function($photo){
                return asset("storage/popular/".$photo["name"]);
            },$new->getPhoto()->get()->toArray());
            $new->addHidden(["getPhoto"]);

            return response()->json([
                'result' => 1,
                'message' => 'success',
                'new' => $new
            ], 201);


        }catch(\Exception $e){
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


