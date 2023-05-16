<?php

namespace App\Http\Controllers;
use DB;
use App\Post;
use App\Viewer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
public function testing(){
    $data= DB::select("SELECT users.*, COALESCE(SUM(viewers.count),0) as total_viewers FROM users 
    LEFT JOIN posts ON posts.user_id = users.id
    LEFT JOIN viewers ON posts.id =  viewers.post_id GROUP BY users.id");
    return $data;
}
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function chart(){
        $result=Post::withCount(['getViewer'])->orderBy('get_viewer_count','desc')->limit(7)->get();
        return response()->json($result);
    }
    public function index()
    {
//        $result=Post::withCount(['getViewer'])->orderBy('get_viewer_count','desc')->limit(7)->get();
//
//        return $result;
// $games=DB::select("SELECT viewers.id, viewers.post_id, viewers.count, posts.name 
// FROM viewers
// JOIN posts ON viewers.post_id = posts.id
// ORDER BY viewers.count DESC
// LIMIT 20");
$data=DB::select("SELECT u.*, COUNT(p.id) AS post_count, SUM(p.count) AS related_post_count
FROM users u
LEFT JOIN posts p ON u.id = p.user_id
GROUP BY u.id ORDER BY related_post_count DESC");
// return $games;
//         $games=DB::select("SELECT users.id, users.name, COUNT(DISTINCT posts.id) AS post_counts, COALESCE(SUM(viewers.count), 0) AS total_viewers
// FROM users
// LEFT JOIN posts ON users.id = posts.user_id
// LEFT JOIN viewers ON posts.id = viewers.post_id
// GROUP BY users.id, users.name
// ORDER BY total_viewers DESC");
$games=DB::select("SELECT posts.name, posts.count FROM posts ORDER BY  posts.count DESC LIMIT 20");
// return $games;


        return view('home',compact('data','games'));

    }

    public function sample(){
        return view('sample')->with("toast","I'm toast");
    }
}


//    public function all(){
//        $games=Post::select(
//            "posts.id",
//            "posts.name",
//            "posts.logo",
//            "posts.type",
//            "posts.category_id",
////            "posts.updated",
//            "posts.size",
//            "posts.version",
////            "posts.requirement",
//            "posts.developer",
////            "posts.description",
////            "posts.features",
////            "posts.video",
////            "posts.link1",
////            "posts.link2",
////            "posts.link3",
//            "categories.title as category_title"
//        )
//            ->leftJoin("categories", "categories.id", "=", "posts.category_id")
//            ->get();
//        $cat=Category::get();
//        return [$games,$cat];
//
//
//    }

// public function games($id){
//     $viewer=new Viewer();
//     $viewer->post_id=$id;
//     $viewer->current=date('Y-m-d');
//     $viewer->save();
//     $game=Post::where('id',$id)->first();
//     // $cat=Category::where('id',$game->category_id)->first()->title;
//     // $c_name=array('category'=>$cat);
//     // $final=array_push($game,$c_name);
//     // return [$final];
//     return gettype($game);
// }

//        $games=Post::select(
//            "posts.id",
//            "posts.name",
//            "posts.logo",
//            "posts.type",
//            "posts.category_id",
////            "posts.updated",
//            "posts.size",
//            "posts.version",
////            "posts.requirement",
//            "posts.developer",
////            "posts.description",
////            "posts.features",
////            "posts.video",
////            "posts.link1",
////            "posts.link2",
////            "posts.link3",
//            "categories.title as category_title"
//        )
//            ->leftJoin("categories", "categories.id", "=", "posts.category_id")->where('category_id',$id)
//            ->paginate(10);
////        $games=Post::where('category_id',$id)->Join('dsd')->latest()->paginate(12);
////            ->through(function ($post,$id){
////            $post->category_title=Category::find($id)->title;
//        return [$games];


//    public function all(){
//
//
//        $games=Post::select(
//            "posts.id",
//            "posts.name",
//            "posts.logo",
//            "posts.type",
//            "posts.category_id",
//            "posts.updated",
//            "posts.size",
//            "posts.version",
//            "posts.requirement",
//            "posts.developer",
//            "posts.description",
//            "posts.features",
//            "posts.video",
//            "posts.link1",
//            "posts.link2",
//            "posts.link3",
//            "categories.title as category_title"
//        )
//            ->leftJoin("categories", "categories.id", "=", "posts.category_id")
//            ->paginate(10);
//        $cat=Category::get();
//        return [$games,$cat];
//
//
//
//
////        `SELECT Customers.CustomerName, Orders.OrderID
////FROM Customers
////LEFT JOIN Orders
////ON Customers.CustomerID=Orders.CustomerID
////ORDER BY Customers.CustomerName;`
//    }
