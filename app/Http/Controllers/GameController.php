<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use App\Software;
use App\Rating;
use App\RequestApp;
use App\Suggest;
use App\Adult;
use App\SearchKeyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
class GameController extends Controller
{
    public function popular(){
//        return 'hello';
        $posts=Post::orderBy('updated_at','desc')->limit(12)->get();
        // $posts=Post::select('*')
        // ->leftJoin('viewers', 'posts.id', '=', 'viewers.post_id')
        // ->orderBy('viewers.count', 'DESC')
        // ->get();
        // return $posts;
        return view('welcome',compact('posts'));
    }
    public function gameList(Request $request){
        $title='ဂိမ်းအားလုံး';
        $games=Post::orderBy('updated_at','desc')->paginate(9);
        return view('games',compact('games','title'));
    }
    public function gameListFilter($id){
        if($id==10){
            return redirect('https://app.modgamesmm.com/adults');
        }else{
        $c_name=Category::where('id',$id)->first()->title;
        $title=$c_name.' ဂိမ်းများ';
        // $games=Post::where('category_id',$id)->latest()->paginate(12);
        $games=Category::find($id)->posts()->orderBy('updated_at', 'desc')->paginate(12);
        return view('games',compact('games','title'));
        }
    }
    public function singleGameList($id){
        // $old=Viewer::where('post_id',$id)->first();
        $game=Post::find($id);
        if(isset($game)){
            $count=$game->count;
        }else{
            $count=0;
        }
        $randomNumber = random_int(1, 9);

        Post::updateOrCreate(['id'=>$id],
        ['count'=>$count + $randomNumber]
      );
        // $game=Post::find($id);
        return view('seegame',compact('game'));
    }
    public function singleGame($slug){
        // $old=Viewer::where('post_id',$slug)->first();
        $game=Post::where('slug',$slug)->first();
        if(isset($game)){
            $count=$game->count;
        }else{
            $count=0;
        }
        $randomNumber = random_int(1, 9);

        Post::updateOrCreate(['slug'=>$slug],
        ['count'=>$count + $randomNumber]
      );
        // $game=Post::find($id);
        return view('seegame',compact('game'));
    }
    public function gameSearch(Request $request){
        $name=$request->name;
        $request->validate([
            "name" => "required|max:35",
        ]);
        $saveKey=new SearchKeyword();
        $saveKey->keywords=$name;
        $saveKey->save();
        $search='aa';
        $title='Search Result For - '.$name;
        $games=Post::query()
            ->where('keywords', 'LIKE', "%{$name}%")
            
            ->paginate(17);
        return view('games',compact('games','search','title'));
    }


    public function showComment($id){
        $post=Post::where('id',$id)->get();
        return view('comment.show',compact('post'));
    }

  
//     public function storeSuggest(Request $request)
//     {
// //        return $request;
//         $request->validate([
//             "name" => "required|max:50",
//             "phone" => "required|max:30",
//             "email" => "required|max:50",
//             "description" => "required|unique:suggests|max:2000",
// //            "playstore_link" => "required",
//         ]);
//         $finish='မင်္ဂလာပါ '.$request->name .'ရေ....သင့်အကြံပြုချက်အတွက် ကျေးဇူးအထူးတင်ပါတယ်ခင်ဗျာ....';
//         $suggest=new Suggest();
//         $suggest->name=$request->name;
//         $suggest->email=$request->email;
//         $suggest->phone=$request->phone;
//         $suggest->description=$request->description;
//         $suggest->save();
//         return view('suggest.create',compact('finish'));
//     }

    public function createSuggest()
    {
        return view('suggest.create');
    }

    public function storeRequest(Request $request)
    {
//        return $request;
        $request->validate([
            "app_name" => "required|max:25",
            "username" => "required|max:25",
            "phone" => "required|max:25",
            "description" => "required|max:50",
           "playstore_link" => "max:50",
        ]);
        $finish='မင်္ဂလာပါ '.$request->username .'ရေ.... မကြာခင်မှာ သင့်တောင်းဆိုတဲ့ '.$request->app_name.' ဂိမ်းကို စစ်ဆေးပီး ဆောင်ရွက်ပေးပါမယ်....';
        $requestApp=new RequestApp();
        $requestApp->app_name=$request->app_name;
        $requestApp->username=$request->username;
        $requestApp->phone=$request->phone;
        $requestApp->description=$request->description;
        $requestApp->playstore_link=$request->playstore_link;
        $requestApp->save();
//        return $finish;
        return view('request.create',compact('finish'));
    }

    public function createRequest()
    {
        return view('request.create');
    }

    public function storeRating(Request $request)
    {
        $request->validate([
            "post_id"=>"required|numeric",
            "rating"=>"required|numeric",
        ]);
        $rating=new Rating();
        $rating->post_id=$request->post_id;
        $rating->rating=$request->rating;
        $rating->save();

        return redirect()->back();
    }
    public function storeComment(Request $request)
    {
        $request->validate([
            "post_id"=>"required|numeric",
            "comment"=>"required|max:40",
        ]);
        $comment=new Comment();
        $comment->post_id=$request->post_id;
        $comment->comment=$request->comment;
        $comment->save();

        return redirect()->back();
    }

    public function adGame()
    {
        return view('ad_accept');
    }

    public function downloadGame($slug)
    {
        $game=Post::where('slug',$slug)->first();
        return view('download',compact('game'));
    }
    public function download($slug, $name, $type)
    {
        if ($type == 'game') {
            $post = Post::where('slug', $slug)->first();
            $link = $post ? $post->{$name} : null;
        } else if ($type == 'software') {
            $software = Software::where('slug', $slug)->first();
            $link = $software ? $software->{$name} : null;
        }else if($type == 'adult') {
            $adult = Adult::where('slug', $slug)->first();
            $link = $adult ? $adult->{$name} : null;
        }
    
        if ($link) {
            return redirect($link);
        } else {
            return abort(404);
        }
    }
    
    public function reportBrokenLink(Request $request){
        $finish='မင်္ဂလာပါ ၂၄ နာရီအတွင်းမှာ ယခုလင့်ကို ပြန်ပြင်ပေးသွားမှာဖြစ်ပါတယ်....';
        $suggest=new Suggest();
        if ($request->post_type == 'game' && Suggest::where('post_id', $request->post_id)->doesntExist()){            
            $suggest->type="game";
            $suggest->post_id = $request->post_id;
            $suggest->save();
        }elseif ($request->post_type == 'software' && Suggest::where('software_id', $request->post_id)->doesntExist()){
            $suggest->type="software";
            $suggest->software_id = $request->post_id;
            $suggest->save();
        }
        return redirect()->back()->with('finish', $finish);
    }
    public function softwareDownload($slug)
    {
        $game=Software::where('slug',$slug)->first();
        return view('download',compact('game'));
    }

            public function softwareList(){
                $title='Software အားလုံး';
                $softwares=Software::orderBy('description','asc')->paginate(12);
                return view('softwares',compact('softwares','title'));
            }
     
            public function singleSoftwareList($slug){
                // $old=Viewer::where('post_id',$id)->first();
                $software=Software::where('slug',$slug)->first();
                if(isset($software)){
                    $count=$software->count;
                }else{
                    $count=0;
                }
                $randomNumber = random_int(1, 9);
                Software::updateOrCreate(['slug'=>$slug],
                ['count'=>$count + $randomNumber]
              );
                return view('seesoftware',compact('software'));
            }
            public function softwareSearch(Request $request){
                $name=$request->name;
                $request->validate([
                    "name" => "required|max:25",
                ]);
                $search=$request->name;
                $title='Search Result For - '.$name;
                $softwares=Software::query()
                    ->where('name', 'LIKE', "%{$name}%")
                    
                    ->paginate(17);
                return view('softwares',compact('softwares','search','title'));
            }
        public function generateSitemap(){
            $urls = DB::table('posts')->pluck('slug');
            return Response::view('sitemap', compact('urls'))->header('Content-Type', 'text/xml');        
        }
}
