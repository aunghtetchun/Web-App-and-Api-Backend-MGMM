<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Popular;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PopularController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $populars=Popular::all();
            foreach ($populars as $g){
                array_map(function($photo){
                    if (!file_exists(public_path()."/storage/popular/".$photo["name"])){
                        Photo::find($photo["id"])->delete();
                    }
                },$g->getPhoto()->get()->toArray());
            }

        return view('popular.index',compact('populars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('popular.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "name" => "required",
            "link1" => "required",
            "logo" => "required",
            "description" => "required",
//            "images.*" => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $popular=new Popular();
        $popular->title=$request->title;
        $popular->name=$request->name;
        $popular->link=$request->link1;
        $popular->description=$request->description;

        if ($request->hasFile('logo')){
            $dir="public/logo";
            $newName = uniqid()."_logo.png";
            $image_resize = Image::make($request->file("logo"));
            $image_resize->encode('png', 100)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/logo/' .$newName));
            $popular->logo = $newName;
        }
        $popular->save();
        if ($request->hasFile('images')){
        $dir="public/popular";
        foreach($request->file('images') as $image)
        {
            $newName = uniqid().$request->name.".png";
            $image_resize = Image::make($image);
            $image_resize->encode('png', 100)->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/popular/' .$newName));
            $photo=new Photo();
            $photo->name=$newName;
            $photo->popular_id=$popular->id;
            $photo->save();
        }
    }
        return redirect()->route("popular.create")->with("toast","Popular Add Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Popular  $popular
     * @return \Illuminate\Http\Response
     */
    public function show(Popular $popular)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Popular  $popular
     * @return \Illuminate\Http\Response
     */
    public function edit(Popular $popular)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Popular  $popular
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Popular $popular)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Popular  $popular
     * @return \Illuminate\Http\Response
     */
    public function destroy(Popular $popular)
    {
        $old=Photo::where('popular_id',$popular->id)->get();
        unlink(storage_path('/app/public/logo/'.$popular->logo));

        foreach ($old as $o){
            unlink(storage_path('/app/public/popular/'.$o->name));
        }
        Photo::where('popular_id',$popular->id)->delete();
        $popular->delete();
        return redirect()->route("popular.index")->with("toast","Popular Delete Successful");
    }
    public function destroyAll(Popular $popular)
    {
        $old=Photo::where('popular_id',$popular->id)->get();
        unlink(storage_path('/app/public/logo/'.$popular->logo));

        foreach ($old as $o){
            unlink(storage_path('/app/public/popular/'.$o->name));
        }
        Photo::where('popular_id',$popular->id)->delete();
        $popular->delete();
        return redirect()->route("popular.index")->with("toast","Popular Delete Successful");
    }
}
