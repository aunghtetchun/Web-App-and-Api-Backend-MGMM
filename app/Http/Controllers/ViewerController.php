<?php

namespace App\Http\Controllers;

use App\Viewer;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\SearchKeyword;

class ViewerController extends Controller
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
$searchKeywords = SearchKeyword::select('id','keywords', 'created_at')
    ->whereIn('created_at', function ($query) {
        $query->select(DB::raw('MAX(created_at)'))
            ->from('search_keywords')
            ->groupBy('keywords');
    })
    ->orderByDesc('created_at')
    ->get();
        return view('viewer.viewer',compact('searchKeywords'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Viewer  $viewer
     * @return \Illuminate\Http\Response
     */
    public function show(Viewer $viewer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Viewer  $viewer
     * @return \Illuminate\Http\Response
     */
    public function edit(Viewer $viewer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Viewer  $viewer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Viewer $viewer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Viewer  $viewer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Viewer $viewer)
    {
        //
    }
}
