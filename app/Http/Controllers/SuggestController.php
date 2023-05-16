<?php

namespace App\Http\Controllers;

use App\Suggest;
use Illuminate\Http\Request;

class SuggestController extends Controller
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
        return view('suggest.index');
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
     * @param  \App\Suggest  $suggest
     * @return \Illuminate\Http\Response
     */
    public function show(Suggest $suggest)
    {
        return view('suggest.show',compact('suggest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suggest  $suggest
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggest $suggest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suggest  $suggest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suggest $suggest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suggest  $suggest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggest $suggest)
    {
        $suggest->delete();
        return redirect()->route("suggest.index")->with("toast","Suggest Delete Successful");
    }
}
