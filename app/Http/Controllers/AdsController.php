<?php

namespace App\Http\Controllers;

use App\Ads;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class AdsController extends Controller
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
        $ads = Ads::all();
        return view('ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ads.create');
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
            "link" => "required",
            "type" => "required",
            "photo.*" => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $ads = new Ads();
        $ads->link = $request->link;
        $ads->type = $request->type;
        if ($request->hasFile('photo')) {
            $dir = "public/ads";
            $newName = uniqid() . "_photo." . $request->file("photo")->getClientOriginalExtension();
            $request->file("photo")->storeAs($dir, $newName);

            $image_resize = Image::make(public_path() . "/storage/ads/" . $newName);
            $image_resize->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
//            $image_resize->save(public_path('storage/thumbnail/' . $newName));
//            return $image_resize->response('png');


            $ads->photo = $newName;
        }
        $ads->save();
        return redirect()->back()->with("toast", "Ads Upload Successful");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ads $ad
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ads  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ad)
    {
        return view('ads.edit', compact('ad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ads $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ads $ad)
    {
        $request->validate([
            "link" => "required",
            "type" => "required",
            "photo.*" => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $ad->link = $request->link;
        $ad->type = $request->type;
        if ($request->hasFile('photo')) {
            $dir = "public/ads";
            $newName = uniqid() . "_photo." . $request->file("photo")->getClientOriginalExtension();
            $request->file("photo")->storeAs($dir, $newName);

            $image_resize = Image::make(public_path() . "/storage/ads/" . $newName);
            $image_resize->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
//            $image_resize->save(public_path('storage/thumbnail/' . $newName));
//            return $image_resize->response('png');
            $ad->photo = $newName;
        }
        $ad->update();
        return redirect()->route('ads.index')->with("toast", "Ads Update Successful");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ads $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ad)
    {
        unlink(storage_path('/app/public/ads/'.$ad->photo));
        $ad->delete();
        return redirect()->route("ads.index")->with("toast","Ads Delete Successful");
    }
}


