<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Auth;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $sections=Section::all();
        return view('backend.section.index',compact('sections'));
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
        $section = new Section;
    
        $section->title=$request->title;
        $section->course_id=$request->course_id;
        $section->priority=$request->priority;
        $section->created_by=Auth::id();       
        $section->save();
        return back()->withSuccessMessage('Data Saved Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $section =Section::findOrFail($id);
    
        $section->title=$request->title;
        $section->course_id=$request->course_id;
        $section->priority=$request->priority;
        $section->updated_by=Auth::id();       
        $section->save();
        return back()->withSuccessMessage('Data Saved Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $section=Section::findOrFail($id);
        if(!is_null($section)){
            $section->delete();

            return back()->withSuccessMessage('Data Deleted Successfully !');
        }
    }
}
