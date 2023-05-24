@extends('layout.template')
@section('content')

<!-- Banner Section Start -->
<section class="banner-style-2 ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 col-xl-8 col-lg-10">
                <div class="banner-content text-center">
                    <span class="subheading">Join the Millions Learning</span>
                    <h1 class="cd-headline clip is-full-width">Learn how to
                        <span class="cd-words-wrapper">
                        <b class="is-visible">design</b>
                        <b>coding</b>
                        <b>develop</b>
                        </span>
                    </h1>

                    <p>Choose from over 100,000 online video courses with new additions published every month</p>
                    
                   <div class="btn-container">
                       <a href="#" class="btn btn-main rounded">Find Courses</a>
                       <a href="#" class="btn btn-white rounded ms-2">Get started </a>
                   </div>
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
<!-- Banner Section End -->
<section class="course-wrapper section-padding ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section-heading mb-70 text-center">
                    <h2 class="font-lg">Popular Courses</h2>
                    <p>Discover Your Perfect Program In Our Courses.</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-lg-center">

            @foreach($courses as $course)
                @if($course->featured=="YES")
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="course-grid bg-shadow tooltip-style">
                        <div class="course-header">
                            <div class="course-thumb">
                                <img src="{{asset('/images/course')}}/{{$course->image}}" alt="" class="img-fluid">
                                <div class="course-price">{{$course->amount}}</div>
                            </div>
                        </div>
        
                        <div class="course-content">
                            <h3 class="course-title mb-20"> <a href="{{route('course_detail',$course->id)}}">{{$course->title}} </a> </h3>

                            <div class="course-footer mt-20 d-flex align-items-center justify-content-between ">
                                <span class="duration"><i class="far fa-clock me-2"></i>{{$course->course_duration}}</span>
                                <span class="students"><i class="far fa-user-alt me-2"></i>51 Students</span>
                                <span class="lessons"><i class="far fa-play-circle me-2"></i>{{$course->lectures}}</span>
                            </div>
                        </div>
                        
                        <div class="course-hover-content">
                            <div class="price">{{$course->amount}}</div>
                            <h3 class="course-title mb-20 mt-30"> <a href="{{route('course_detail',$course->id)}}">{{$course->title}} </a> </h3>
                            <div class="course-meta d-flex align-items-center mb-20">
                                <div class="author me-4">
                                    <img src="{{asset('/images/course/course-2.jpg')}}" alt="" class="img-fluid">
                                    <a href="#">K M Nazrul</a>
                                </div>
                                <span class="lesson"> <i class="far fa-file-alt"></i>{{$course->lectures}}</span>
                            </div>
                            <p class="mb-20">{{$course->overview}}</p>
                            <a href="{{route('course_detail',$course->id)}}" class="btn btn-grey btn-sm rounded">Join Now <i class="fal fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- COURSE END -->
                @endif
            @endforeach

        </div>
    </div>
</section>
@endsection