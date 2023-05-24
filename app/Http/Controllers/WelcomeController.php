<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Sales;
use App\Models\WatchHistory;

use Auth;
use DB;


class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = Categories::all();
        $courses = Course::all();
        return view('welcome',compact('categories','courses'));
    }
    
    
    public function admin()
    {   
       return view('backend.home.index');
    }
    
    

    public function Userdash()
    {  
        
       $courses = DB::select('SELECT a.* FROM courses a,users u,sales s where a.id=s.course_id and s.user_id=u.id  and u.id='.Auth::id().'');
       
       return view('my_course',compact('courses'));
    }
    
    
    public function CourseWatch($id){
        
        
        $class = Classes::findOrFail($id);
        $course = Course::where('id',$class->course_id)->first();
        $class_id=$id;
        return view('course_watch',compact('class','course','class_id'));
    }
    
    
    public function contact()
    {   
        $categories = Categories::all();
        $courses = Course::all();
        return view('contact',compact('categories','courses'));
    }

    public function about()
    {   
        $categories = Categories::all();
        $courses = Course::all();
        return view('about',compact('categories','courses'));
    }
    public function course()
    {   
        $categories = Categories::all();
        $courses = Course::all();
        return view('course',compact('categories','courses'));
    }

    
    public function course_detail($id)
    {   
        //$categories = Categories::all();
        $courses = Course::findOrFail($id);
        $watchHistory = WatchHistory ::where('user_id',Auth::id())->where('course_id',$id)->get();
        return view('course_detail',compact('courses','watchHistory'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function privacy()
    {
    
        return view('privacy');

    }
    
    
    public function refund()
    {
    
        return view('refund');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
