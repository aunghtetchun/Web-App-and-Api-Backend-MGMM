<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Photo;
use App\Post;
use App\Post_category;
use App\Rating;
use App\Traffic;
use App\Viewer;
use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts=Post::latest()->get();
        // foreach ($posts as $g){
        //     array_map(function($photo){
        //         if (!file_exists(public_path()."/storage/post/".$photo["name"])){
        //             Photo::find($photo["id"])->delete();
        //         }
        //     },$g->getPhoto()->get()->toArray());
        // }
        $cacheKey = 'cached_data';

        // Check if the data is in the cache
        if (Cache::has($cacheKey)) {
            $posts = Cache::get($cacheKey);
        } else {
            // If not in cache, fetch data from the database and store in the cache
            $posts = Post::latest()->get(); // Replace 'YourModel' with your actual model name

            // Cache the data for 60 minutes (you can adjust the time as per your requirement)
            Cache::put($cacheKey, $posts, 60);
        }

        return view('post.index',compact('posts'));
    }

    public function showRating($id){
        $post=Post::where('id',$id)->get();
        return view('rating.show',compact('post'));
    }
    public function showComment($id){
        $post=Post::where('id',$id)->get();
        return view('comment.show',compact('post'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        return $request;
        $request->validate([
            "name" => "required",
            "type" => "required",
            "logo" => "required",
            "category_id" => "required|numeric",
            "updated" => "required",
            "size" => "required",
            "version" => "required",
            "requirement" => "required",
            "developer" => "required",
            "features" => "required",
            "description" => "required",
            "keywords" => "required",
            "images" => "required",
//            "images.*" => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $post=new Post();
        $post->name_1=$request->name_1;
        $post->name_2=$request->name_2;
        $post->name_3=$request->name_3;
        $post->name=$request->name;
        $post->type=$request->type;
        $post->user_id=auth()->user()->id;
        $post->category_id=$request->category_id;
        $post->updated=$request->updated;
        $post->new=2;
        $post->size=$request->size;
        $post->keywords=strtolower($request->keywords.', '.$request->name);
        $post->version=$request->version;
        $post->requirement=$request->requirement;
        $post->developer=$request->developer;
        $post->features=$request->features;
        $post->video=$request->video;
        $post->description=$request->description;
        if ($request->link1){
            $post->link1=$request->link1;
        }else{
            $post->link1=null;
        }
        if ($request->link2){
            $post->link2=$request->link2;
        }
        if ($request->link3){
            $post->link3=$request->link3;
        }else{
            $post->link3=null;
        }
        if ($request->hasFile('logo')){
            $dir="public/logo";
//            $newName = uniqid()."_logo.".$request->file("logo")->getClientOriginalExtension();
            $newName = uniqid()."_logo.png";
            $image_resize = Image::make($request->file("logo"));
            $image_resize->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/logo/' .$newName));

//            $request->file("logo")->storeAs($dir,$newName);

//            $image_resize = Image::make(public_path()."/storage/logo/".$newName);
//            $image_resize->resize(90, null, function ($constraint) {
//                $constraint->aspectRatio();
//            });
//            $image_resize->save(public_path('storage/thumbnail/' .$newName));
////            return $image_resize->response('png');


            $post->logo = $newName;
        }
        $post->save();

        Post_category::where('post_id',$post->id)->delete();
        foreach ($request['tag_id'] as $t){
//            if (Post_category::where('category_id',$t)->get()!=[]){
            $tag=new Post_category();
            $tag->post_id = $post->id;
            $tag->category_id = $t;
            $tag->save();
//            }
        }

        if ($request->hasFile('images')){
            $dir="public/post";
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_post.png";
//                $image->storeAs($dir,$newName);
                $image_resize = Image::make($image);
                $image_resize->resize(530, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
//                return $image_resize->response();
                $image_resize->save(public_path('storage/post/' .$newName));
//                $newName = uniqid()."_post.".$image->getClientOriginalExtension();
//                Image::make($image)->stream("png", 100);
//                $image->storeAs($dir,$newName);
//
//                $image_resize = Image::make(public_path()."/storage/post/".$newName);
//                $image_resize->resize(400, null, function ($constraint) {
//                    $constraint->aspectRatio();
//                });
//                $image_resize->save(public_path('storage/thumbnail/' .$newName));

                $photo=new Photo();
                $photo->name=$newName;
                $aa=Post::get()->last();
                $photo->post_id=$aa->id;
                $photo->save();
            }
//            return 'success';

        }
        return redirect()->route("post.create")->with("toast","Game Add Successful");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if (auth()->user()->role =1 || $post->user_id = auth()->user()->id  ){
        $request->validate([
            "name" => "required",
            "type" => "required",
//            "logo" => "required",
            "category_id" => "required|numeric",
            "updated" => "required",
            "size" => "required",
            "version" => "required",
            "requirement" => "required",
            "developer" => "required",
            "features" => "required",
           "keywords" => "required",
            "description" => "required",
//            "images.*" => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        if ($request['tag_id']){
            Post_category::where('post_id',$post->id)->delete();
            foreach ($request['tag_id'] as $t){
//            if (Post_category::where('category_id',$t)->get()!=[]){
                $tag=new Post_category();
                $tag->post_id = $post->id;
                $tag->category_id = $t;
                $tag->save();
//            }
            }
        }

        $post->name_1=$request->name_1;
        $post->name_2=$request->name_2;
        $post->name_3=$request->name_3;
        $post->name=$request->name;
        $post->type=$request->type;
        $post->keywords=strtolower($request->keywords);
        $post->category_id=$request->category_id;
        $post->updated=$request->updated;
        $post->size=$request->size;
        $post->version=$request->version;
        $post->requirement=$request->requirement;
        $post->developer=$request->developer;
        $post->features=$request->features;
        $post->video=$request->video;
        $post->new=1;
        $post->description=$request->description;
        if ($request->link1){
            $post->link1=$request->link1;
        }else{
            $post->link1=null;
        }
        if ($request->link2){
            $post->link2=$request->link2;
        }else{
            $post->link2=null;
        }
        if ($request->link3){
            $post->link3=$request->link3;
        }else{
            $post->link3=null;
        }
        if ($request->hasFile('logo')){
            $dir="public/logo";
//            $newName = uniqid()."_logo.".$request->file("logo")->getClientOriginalExtension();
//            $request->file("logo")->storeAs($dir,$newName);
            $newName = uniqid()."_logo.png";
            $image_resize = Image::make($request->file("logo"));
            $image_resize->encode('png', 100)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/logo/' .$newName));
//            return $image_resize->response();
//            $image_resize = Image::make(public_path()."/storage/logo/".$newName);
//            $image_resize->resize(90, 100);
//            $image_resize->save(public_path('storage/thumbnail/' .$newName));
            $post->logo = $newName;
        }
        $post->update();

        return redirect()->route("post.index")->with("toast","Game Update Successful");
    }else{
        return redirect()->route("post.index")->with("toast","ဒီဂိမ်းကိုသင်တင်ခဲ့တာမဟုတ်တဲ့အတွက်ပြင်လို့မရနိုင်ပါဘူး");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (auth()->user()->role =1 || $post->user_id = auth()->user()->id  ){     

        $old=Photo::where('post_id',$post->id)->get();
        unlink(storage_path('/app/public/logo/'.$post->logo));
//        unlink(storage_path('/app/public/thumbnail/'.$post->logo));

        foreach ($old as $o){
            unlink(storage_path('/app/public/post/'.$o->name));
//            unlink(storage_path('/app/public/thumbnail/'.$o->name));
        }
        Photo::where('post_id',$post->id)->delete();
        Rating::where('post_id',$post->id)->delete();
        Comment::where('post_id',$post->id)->delete();
        Viewer::where('post_id',$post->id)->delete();
        $post->delete();
        return redirect()->route("post.index")->with("toast","Game Delete Successful");
    }else{
        return redirect()->route("post.index")->with("toast","ဒီဂိမ်းကိုသင်တင်ခဲ့တာမဟုတ်တဲ့အတွက်ဖျက်လို့မရနိုင်ပါဘူး");
    }

    }
    public function viewerDel( $id)
    {
        Viewer::where('post_id',$id)->delete();
        return redirect()->route("viewer.index")->with("toast","Viewer Delete Successful");
    }

    public function reviewFilter(){
        $data=Post::latest()->get();
        $posts = $data->filter(function ($value, $key) {
            return Str::length($value->description) > 12;
        });
        return view('post.index',compact('posts'));
    }
    public function noreviewFilter(){
        $data=Post::latest()->get();
        $posts = $data->filter(function ($value, $key) {
            return Str::length($value->description) < 12;
        });
        return view('post.index',compact('posts'));
    }
//    public function driveFilter(){
//        $data=Post::latest()->get();
//        $posts = $data->filter(function ($value, $key) {
//            return str_contains($value->link1, 'drive.google') || str_contains($value->link2, 'drive.google') || str_contains($value->link3, 'drive.google');
//        });
//        return view('post.index',compact('posts'));
//    }
//    public function nodriveFilter(){
//        $data=Post::latest()->get();
//        $posts = $data->filter(function ($value, $key) {
//            return !str_contains($value->link1, 'drive.google');
//        });
//        return view('post.index',compact('posts'));
//    }
    public function modFilter(){
        $data=Post::latest()->get();
        $posts = $data->filter(function ($value, $key) {
            return $value->link1!=null;
        });
        return view('post.index',compact('posts'));
    }
    public function noModFilter(){
        $data=Post::latest()->get();
        $posts = $data->filter(function ($value, $key) {
            return $value->link1==null;
        });
        return view('post.index',compact('posts'));
    }
}
