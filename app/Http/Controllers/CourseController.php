<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Auth;
use File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $courses=Course::all();
        return view('backend.course.index',compact('courses'));
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
        if($request->image){
	    $post_thumbnail = $request->file('image');
        $imageName = $post_thumbnail->getClientOriginalName().'('.time().').'.$request->image->extension();
       //$imageName = time().'.'.$request->image->extension(); 
       $request->image->move(public_path('images/course'), $imageName); 
	 }else{
	 	$imageName = '';
	 } 
        
        
        $course = new Course;
    
        $course->title=$request->title;
        $course->category_id=$request->category;
        $course->overview=$request->overview;
        $course->description=$request->description;
        $course->featured=$request->featured;
        $course->level=$request->level;
        $course->active=$request->status;
        $course->course_duration=$request->duration;
        $course->lectures=$request->lectures;
        $course->amount=$request->amount;
        $course->image=$imageName;
        $course->created_by=Auth::id();       
        $course->save();
    
        
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
        $course=Course::findOrFail($id);
        return view('backend.course.course_edit',compact('course'));
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
        if($request->image){
	    $post_thumbnail = $request->file('image');
        $imageName = "course".'('.time().').'.$request->image->extension();
       //$imageName = time().'.'.$request->image->extension(); 
       $request->image->move(public_path('images/course'), $imageName); 
	    }else{
	 	$imageName = '';
	 } 
        
        $course =Course::findOrFail($id);

        $course->title=$request->title;
        $course->category_id=$request->category;
        $course->overview=$request->overview;
        $course->description=$request->description;
        $course->featured=$request->featured;
        $course->level=$request->level;
        $course->active=$request->status;
        $course->course_duration=$request->duration;
        $course->lectures=$request->lectures;
        $course->amount=$request->amount;
        $course->image=$imageName;
        $course->updated_by=Auth::id();       
        $course->save();
    
        
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
        $course=Course::findOrFail($id);
        if(!is_null($course)){
            $course->delete();

            return back()->withSuccessMessage('Data Deleted Successfully !');
        }
    }
}
