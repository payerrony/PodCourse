<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classes;
use Auth;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes=Classes::all();
        return view('backend.class.index',compact('classes'));
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
        
        if($request->file_link){
	    $post_thumbnail = $request->file('file_link');
        $fileName = $post_thumbnail->getClientOriginalName().'('.time().').'.$request->file_link->extension();
       $request->file_link->move(public_path('file'), $fileName); 
	 }else{
	 	$fileName = '';
	 } 
        
        
            $classes = new Classes;
            
            
            $classes->title=$request->title;
            
            $classes->description=$request->description;
            
            $classes->section_id=$request->section_id;
            $classes->course_id=$request->course_id;
            
            $classes->category_id=find_a_field('courses','category_id','id='.$request->course_id);
            $classes->featured=$request->featured;
            $classes->class_type=$request->class_type;
            $classes->file_link=$fileName;
            $classes->video_link=$request->video_link;
            $classes->duration=$request->duration;
            $classes->priority=$request->priority;
            $classes->created_by=Auth::id();       
            $classes->save();
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
        if($request->file_link){
	    $post_thumbnail = $request->file('file_link');
        $fileName = $post_thumbnail->getClientOriginalName().'('.time().').'.$request->file_link->extension();
       $request->file_link->move(public_path('file'), $fileName); 
	 }else{
	 	$fileName = '';
	 }
        
            $classes = Classes::findOrFail($id);
            $classes->title=$request->title;
            
            $classes->description=$request->description;
            $classes->section_id=$request->section_id;
            $classes->course_id=$request->course_id;
            $classes->category_id=find_a_field('courses','category_id','id='.$request->course_id);

            $classes->featured=$request->featured;
            $classes->class_type=$request->class_type;
            $classes->file_link=$fileName;
            $classes->video_link=$request->video_link;
            $classes->duration=$request->duration;
            $classes->priority=$request->priority;
            $classes->updated_by=Auth::id();       
            $classes->save();
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
        $cls=Classes::findOrFail($id);
        if(!is_null($cls)){
            $cls->delete();

            return back()->withSuccessMessage('Data Deleted Successfully !');
        }
    }
}
