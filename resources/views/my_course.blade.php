@extends('layout.template')
@section('content')


<!--course section start-->
    <section class="section-padding page" >
        <div class="course-top-wrap">
            
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h4>আমার কোর্সসমূহ</h4>
                    </div>
                    <hr class="mt-2 w-50">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row ">
                @foreach($courses as $course)
                <div class="course-item col-lg-6 col-md-6">
                    <div class="single-course style-2 bg-shade border-0">
                        <div class="row g-0 align-items-center">
                            <div class="col-xl-5">


                                <div class="course-thumb" style="background:url('{{asset('public/images/course')}}/{{$course->image}}')">
                                    
                                </div>
                            </div>
                            <div class="col-xl-7">
                                <div class="course-content py-4 pt-xl-0">
                                    
                                    <h2 class="course-title"> <a href="{{route('course_detail',$course->id)}}">{{$course->title}}</a></h2>
                                    <div class="course-meta d-flex align-items-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        <!--course-->
    </section>
    <!--course section end-->

@endsection