<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Adult;
use App\Traffic;
use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class AdultController extends Controller
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
        $adults=Adult::latest()->get();
        foreach ($adults as $g) {
            $logo = $g->logo;
            $g->logo = "http://mgmm.pao666.net/storage/logo/". $logo;
        }
        return view('adult.index',compact('adults'));
    }

    public function create()
    {
        return view('adult.create');
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
            "name" => "required",
            // "slug" => "required",
            "type" => "required",
            "logo" => "required",
            "updated" => "required",
            "size" => "required",
            "version" => "required",
            "requirement" => "required",
            "developer" => "required",
            "features" => "required",
            "description" => "required",
//            "images.*" => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $adult=new Adult();
        $adult->name_1=$request->name_1;
        $adult->name_2=$request->name_2;
        $adult->name_3=$request->name_3;
        $adult->name=$request->name;
        // $adult->slug=$request->slug;
        $adult->type=$request->type;
        $adult->user_id=auth()->user()->id;
        $adult->updated=$request->updated;
        $adult->size=$request->size;
        $adult->version=$request->version;
        $adult->requirement=$request->requirement;
        $adult->developer=$request->developer;
        $adult->features=$request->features;
        $adult->description=$request->description;
        if ($request->link1){
            $adult->link1=$request->link1;
        }else{
            $adult->link1=null;
        }
        if ($request->link2){
            $adult->link2=$request->link2;
        }
        if ($request->link3){
            $adult->link3=$request->link3;
        }else{
            $adult->link3=null;
        }
        if ($request->hasFile('logo')){
            $dir="public/slogo";
//            $newName = uniqid()."_slogo.".$request->file("slogo")->getClientOriginalExtension();
            $newName = uniqid()."_slogo.png";
            $image_resize = Image::make($request->file("logo"));
            $image_resize->encode('png', 100)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/slogo/' .$newName));
            $adult->logo = $newName;
        }
        $adult->save();

        

        if ($request->hasFile('images')){
            $dir="public/adult";
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_adult.png";
//                $image->storeAs($dir,$newName);
                $image_resize = Image::make($image);
                $image_resize->encode('png', 100)->resize(430, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
//                return $image_resize->response();
                $image_resize->save(public_path('storage/adult/' .$newName));
                $photo=new Photo();
                $photo->name=$newName;
                $aa=Adult::get()->last();
                $photo->adult_id=$aa->id;
                $photo->save();
            }
//            return 'success';

        }
        return redirect()->route("adult.create")->with("toast","Adult Add Successful");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Adult  $adult
     * @return \Illuminate\Http\Response
     */
    public function show(Adult $adult)
    {
        return view('adult.show',compact('adult'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Adult  $adult
     * @return \Illuminate\Http\Response
     */
    public function edit(Adult $adult)
    {
        return view('adult.edit',compact('adult'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Adult  $adult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adult $adult)
    {
        $request->validate([
            "name" => "required",
            // "slug" => "required",
            "type" => "required",
//            "logo" => "required",
            "updated" => "required",
            "size" => "required",
            "version" => "required",
            "requirement" => "required",
            "developer" => "required",
            "features" => "required",
//            "link1" => "required",
            "description" => "required",
//            "images.*" => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
      

        $adult->name_1=$request->name_1;
        $adult->name_2=$request->name_2;
        $adult->name_3=$request->name_3;
        $adult->name=$request->name;
        $adult->count=$request->count;
        // $adult->slug=$request->slug;
        $adult->type=$request->type;
        $adult->updated=$request->updated;
        $adult->size=$request->size;
        $adult->version=$request->version;
        $adult->requirement=$request->requirement;
        $adult->developer=$request->developer;
        $adult->features=$request->features;
        $adult->description=$request->description;
        if ($request->link1){
            $adult->link1=$request->link1;
        }else{
            $adult->link1=null;
        }
        if ($request->link2){
            $adult->link2=$request->link2;
        }else{
            $adult->link2=null;
        }
        if ($request->link3){
            $adult->link3=$request->link3;
        }else{
            $adult->link3=null;
        }
        // if ($request->hasFile('logo')){
        //     $dir="public/slogo";
        //     $newName = uniqid()."_slogo.png";
        //     $image_resize = Image::make($request->file("logo"));
        //     $image_resize->encode('png', 100)->resize(100, null, function ($constraint) {
        //         $constraint->aspectRatio();
        //     });
        //     $image_resize->save(public_path('storage/slogo/' .$newName));
        //     $adult->logo = $newName;
        // }
        $adult->update();

        return redirect()->route("adult.index")->with("toast","Adult Update Successful");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Adult  $adult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adult $adult)
    {
        if (auth()->user()->id !==3 && $adult->user_id != auth()->user()->id){
            return redirect()->route("adult.index")->with("toast","ဒီဂိမ်းကိုသင်တင်ခဲ့တာမဟုတ်တဲ့အတွက်ဖျက်လို့မရနိုင်ပါဘူး");
        }else{

        $old=Photo::where('adult_id',$adult->id)->get();
        // unlink(storage_path('/app/public/slogo/'.$adult->logo));
//        unlink(storage_path('/app/public/thumbnail/'.$adult->logo));

        foreach ($old as $o){
            unlink(storage_path('/app/public/adult/'.$o->name));
//            unlink(storage_path('/app/public/thumbnail/'.$o->name));
        }
        // Aphoto::where('adult_id',$adult->id)->delete();
        // Comment::where('adult_id',$adult->id)->delete();
        $adult->delete();
        return redirect()->route("adult.index")->with("toast","Adult Delete Successful");
    }

    }
}
