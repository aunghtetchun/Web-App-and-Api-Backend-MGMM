<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Photo;
use App\Software;
use App\Traffic;
use Faker\Provider\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class SoftwareController extends Controller
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
        $softwares=Software::latest()->get();
        // foreach ($softwares as $g){
        //     array_map(function($photo){
        //         if (!file_exists(public_path()."/storage/software/".$photo["name"])){
        //             Photo::find($photo["id"])->delete();
        //         }
        //     },$g->getPhoto()->get()->toArray());
        // }
        return view('software.index',compact('softwares'));
    }


    public function showComment($id){
        $software=Software::where('id',$id)->get();
        return view('comment.show',compact('software'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('software.create');
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

        $software=new Software();
        $software->name_1=$request->name_1;
        $software->name_2=$request->name_2;
        $software->name_3=$request->name_3;
        $software->name=$request->name;
        // $software->slug=$request->slug;
        $software->type=$request->type;
        $software->user_id=auth()->user()->id;
        $software->updated=$request->updated;
        $software->size=$request->size;
        $software->version=$request->version;
        $software->requirement=$request->requirement;
        $software->developer=$request->developer;
        $software->features=$request->features;
        $software->description=$request->description;
        if ($request->link1){
            $software->link1=$request->link1;
        }else{
            $software->link1=null;
        }
        if ($request->link2){
            $software->link2=$request->link2;
        }
        if ($request->link3){
            $software->link3=$request->link3;
        }else{
            $software->link3=null;
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
            $software->logo = $newName;
        }
        $software->save();

        

        if ($request->hasFile('images')){
            $dir="public/software";
            foreach($request->file('images') as $image)
            {
                $newName = uniqid()."_software.png";
//                $image->storeAs($dir,$newName);
                $image_resize = Image::make($image);
                $image_resize->encode('png', 100)->resize(430, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
//                return $image_resize->response();
                $image_resize->save(public_path('storage/software/' .$newName));
                $photo=new Photo();
                $photo->name=$newName;
                $aa=Software::get()->last();
                $photo->software_id=$aa->id;
                $photo->save();
            }
//            return 'success';

        }
        return redirect()->route("software.create")->with("toast","Software Add Successful");
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function show(Software $software)
    {
        return view('software.show',compact('software'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function edit(Software $software)
    {
        return view('software.edit',compact('software'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Software $software)
    {
        if (auth()->user()->id !==3 && $software->user_id != auth()->user()->id  ){
        return redirect()->route("software.index")->with("toast","ဒီဂိမ်းကိုသင်တင်ခဲ့တာမဟုတ်တဲ့အတွက်ပြင်လို့မရနိုင်ပါဘူး");
        }else{
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
      

        $software->name_1=$request->name_1;
        $software->name_2=$request->name_2;
        $software->name_3=$request->name_3;
        $software->name=$request->name;
        // $software->slug=$request->slug;
        $software->type=$request->type;
        $software->updated=$request->updated;
        $software->size=$request->size;
        $software->version=$request->version;
        $software->requirement=$request->requirement;
        $software->developer=$request->developer;
        $software->features=$request->features;
        $software->description=$request->description;
        if ($request->link1){
            $software->link1=$request->link1;
        }else{
            $software->link1=null;
        }
        if ($request->link2){
            $software->link2=$request->link2;
        }else{
            $software->link2=null;
        }
        if ($request->link3){
            $software->link3=$request->link3;
        }else{
            $software->link3=null;
        }
        if ($request->hasFile('logo')){
            $dir="public/slogo";
            $newName = uniqid()."_slogo.png";
            $image_resize = Image::make($request->file("logo"));
            $image_resize->encode('png', 100)->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_resize->save(public_path('storage/slogo/' .$newName));
            $software->logo = $newName;
        }
        $software->update();

        return redirect()->route("software.index")->with("toast","Software Update Successful");
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function destroy(Software $software)
    {
        if (auth()->user()->id !==3 && $software->user_id != auth()->user()->id){
            return redirect()->route("software.index")->with("toast","ဒီဂိမ်းကိုသင်တင်ခဲ့တာမဟုတ်တဲ့အတွက်ဖျက်လို့မရနိုင်ပါဘူး");
        }else{

        $old=Photo::where('software_id',$software->id)->get();
        // unlink(storage_path('/app/public/slogo/'.$software->logo));
//        unlink(storage_path('/app/public/thumbnail/'.$software->logo));

        foreach ($old as $o){
            unlink(storage_path('/app/public/software/'.$o->name));
//            unlink(storage_path('/app/public/thumbnail/'.$o->name));
        }
        Photo::where('software_id',$software->id)->delete();
        Comment::where('software_id',$software->id)->delete();
        $software->delete();
        return redirect()->route("software.index")->with("toast","Software Delete Successful");
    }

    }

    
}
