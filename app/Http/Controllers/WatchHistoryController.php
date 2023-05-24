<?php

namespace App\Http\Controllers;

use App\Models\WatchHistory;
use Illuminate\Http\Request;
use Auth;

class WatchHistoryController extends Controller
{
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
    public function store(Request $request)
    {
        
        $wh = new WatchHistory;
        
        $wh->user_id=Auth::id();
        $wh->class_id=$request->class_id;
        $wh->course_id=$request->course_id;
        $wh->save();
        return back()->withSuccessMessage('Data Saved Successfully !');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\WatchHistory  $watchHistory
     * @return \Illuminate\Http\Response
     */
    public function show(WatchHistory $watchHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\WatchHistory  $watchHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(WatchHistory $watchHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\WatchHistory  $watchHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WatchHistory $watchHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\WatchHistory  $watchHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(WatchHistory $watchHistory)
    {
        //
    }
}
