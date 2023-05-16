<?php

namespace App\Http\Controllers;

use App\GVersion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GVersionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $version=GVersion::latest()->first();
        return $version;
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
    public function store(Request $request)
    {
        $request->validate([
            'version' => "required|min:3|max:50",
            'link'  => "required|min:3|max:100",
            'code'=>"required|min:3|max:100",
            'video_one'  => "required|min:3|max:100",
            'video_two'  => "required|min:3|max:100",
            'banner_one'  => "required|min:3|max:100",
            'banner_two'  => "required|min:3|max:100",
        ]);
        if ($request->password==='nopainnogain') {
            $gVersion = new GVersion();
            $gVersion->version = $request->version;
            $gVersion->link = $request->link;
            $gVersion->code = $request->code;
            $gVersion->video_one = $request->video_one;
            $gVersion->video_two = $request->video_two;
            $gVersion->banner_one = $request->banner_one;
            $gVersion->banner_two = $request->banner_two;
            $gVersion->save();
            return redirect()->route("profile.edit")->with("toast","Version update Successful");
        }else{
            return redirect()->route("profile.edit")->with("toast","Version change fail");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GVersion  $gVersion
     * @return \Illuminate\Http\Response
     */
    public function show(GVersion $gVersion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GVersion  $gVersion
     * @return \Illuminate\Http\Response
     */
    public function edit(GVersion $gVersion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GVersion  $gVersion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GVersion $gVersion)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GVersion  $gVersion
     * @return \Illuminate\Http\Response
     */
    public function destroy(GVersion $gVersion)
    {
        //
    }
}
