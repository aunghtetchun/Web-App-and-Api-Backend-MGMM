<?php

namespace App\Http\Controllers;

use App\Skin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SkinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skins=Skin::all();
        return view('skin.index',compact('skins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skin.create');
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
        ]);
        $skin=new Skin();
        $skin->name=$request->name;
        $skin->type=$request->type;
        if ($request->hasFile('logo')){
            $dir="public/skin";
           $newName = uniqid()."_skin.".$request->file("logo")->getClientOriginalExtension();
           $image_resize = Image::make($request->file("logo"));
           $image_resize->resize(700, null, function ($constraint) {
            $constraint->aspectRatio();
            });
           $image_resize->save(public_path('storage/skin/' .$newName));
            $skin->url = $newName;
        }
        $skin->save();       
        return redirect()->route("skin.create")->with("toast","Skin အသစ်ထည့်ပြီးပါပြီ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skin  $skin
     * @return \Illuminate\Http\Response
     */
    public function show(Skin $skin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skin  $skin
     * @return \Illuminate\Http\Response
     */
    public function edit(Skin $skin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skin  $skin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skin $skin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skin  $skin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skin $skin)
    {
        unlink(storage_path('/app/public/skin/'.$skin->url));
        $skin->delete();
        return redirect()->route("skin.index")->with("toast","Skin Delete Successful");
    }
}
