<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PhotoController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeBackground(Request $request){

        $request->validate([
            "background" => "required",
        ]);
        if ($request->hasFile('background')){
            $dir="public/background";
            $newName = uniqid()."_background.".$request->file("background")->getClientOriginalExtension();
            $request->file("background")->storeAs($dir,$newName);

            $image_resize = Image::make(public_path("/storage/background/".$newName));
//            $image_resize = Image::make(storage_path("public/storage/background/".$newName));
            $image_resize->resize(1920, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            unlink(public_path('dashboard/css/main_bg.jpg'));
            $image_resize->save(public_path('dashboard/css/main_bg.jpg'));
        }
        return redirect()->back()->with("toast","Background Change Successful");
    }

    public function store(Request $request)
    {
        $request->validate([
            "post_id" => "numeric",
            "software_id" => "numeric",
            "account_id" => "numeric",
//            "images.*" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        if ($request->hasFile('images') && $request->post_id){
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
//                $newName = uniqid()."_post.".'png';
//                $image_resize=Image::make($image)->stream("png", 100);
////                $image->storeAs($dir,$newName);
//
////                $image_resize = Image::make(public_path()."/storage/post/".$newName);
//                $image_resiz = Image::make($image_resize);
//                $image_resiz->resize(1000, null, function ($constraint) {
//                    $constraint->aspectRatio();
//                });
//                $newName = uniqid()."_post.".$image_resiz->getClientOriginalExtension();
//                $image_resiz->save(public_path('storage/post/' .$newName));
//                $image_resize->save(public_path('storage/thumbnail/' .$newName));

                $photo=new Photo();
                $photo->name=$newName;
                $photo->post_id=$request->post_id;
                $photo->save();
            }
        }
        elseif ($request->hasFile('images') && $request->account_id){
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_account.png";
                $image_resize = Image::make($image);
                $image_resize->resize(500, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image_resize->save(public_path('storage/skins/' .$newName));

                $photo=new Photo();
                $photo->name=$newName;
                $photo->account_id=$request->account_id;
                $photo->save();
        }}
        else{
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_software.png";
                $image_resize = Image::make($image);
                $image_resize->resize(530, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
//                return $image_resize->response();
                $image_resize->save(public_path('storage/software/' .$newName));

                $photo=new Photo();
                $photo->name=$newName;
                $photo->software_id=$request->software_id;
                $photo->save();
            }
        }
        return redirect()->back()->with("toast","Photo Upload Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        if(isset($photo->post_id)){
        unlink(storage_path('/app/public/post/'.$photo->name));

        }
        elseif(isset($photo->account_id)){
            unlink(storage_path('/app/public/skins/'.$photo->name));
        }
        else{
            unlink(storage_path('/app/public/software/'.$photo->name));
        }
//        unlink(storage_path('/app/public/thumbnail/'.$photo->name));
        $photo->delete();
        return redirect()->back()->with("toast","Photo Delete Successful");
    }
}
