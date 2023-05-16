<?php

namespace App\Http\Controllers;

use App\RequestApp;
use Illuminate\Http\Request;

class RequestAppController extends Controller
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
        return view('request.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\RequestApp  $requestApp
     * @return \Illuminate\Http\Response
     */
    public function show(RequestApp $requestApp)
    {
        return view('request.show',compact('requestApp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequestApp  $requestApp
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestApp $requestApp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RequestApp  $requestApp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RequestApp $requestApp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequestApp  $requestApp
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequestApp $requestApp)
    {
        $requestApp->delete();
        return redirect()->route("request.index")->with("toast","Request Delete Successful");

    }
}
