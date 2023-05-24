@extends('layout.template')

@section('content')
<!-- Banner Section Start -->
<section class="banner-style-4 banner-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-12 col-xl-6 col-lg-6">
                <div class="banner-content ">
                    <span class="subheading"></span>
                    <h1>Upgrade your learning Skills & Upgrade your life</h1>
                    <p class="mb-40"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores ullam libero magni reiciendis 
                        quam ipsa blanditiis, facilis velit eaque illo?</p>

                    <div class="btn-container">
                        <a href="#" class="btn btn-main rounded">Find Courses</a>
                        <a href="#" class="btn btn-white rounded ms-2">Get started </a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-xl-6 col-lg-6">
                <div class="banner-img-round mt-5 mt-lg-0 ps-5">
                    <img src="{{asset('/images/banner/banner_img.png')}}" alt="" class="img-fluid">
                </div>
            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
<!-- Banner Section End -->

<!-- Counter Section start -->
<section class="counter-section4">
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-xl-12 counter-inner">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="counter-item mb-5 mb-lg-0">
                            <div class="count">
                                <span class="counter h2">200</span><span>+</span>
                            </div>
                            <p>Students</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="counter-item mb-5 mb-lg-0">
                            <div class="count">
                                <span class="counter h2">5</span><span>+</span>
                            </div>
                            <p>Online Courses</p>
                        </div>
                    </div>


                    <div class="col-lg-4 col-md-6">
                        <div class="counter-item">
                            <div class="count">
                                <span class="counter h2">100</span><span>%</span>
                            </div>
                            <p>Satisfaction</p>     
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
</section>
<!-- COunter Section End -->




<!--  Course style 1 -->

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

<!--  Course style 1 End -->




<!--  Course category -->
<section class="course-category-3 section-padding">
    <div class="container">
        <div class="row mb-70 justify-content-center">
            <div class="col-xl-8">
                <div class="section-heading text-center">
                    <h2 class="font-lg">Categories you want to learn</h2>
                    <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam</p>
                </div>
            </div>
        </div>

        <div class="row">
            
            <div class="col-xl col-lg-4 col-sm-6">
                <div class="single-course-category style-3 bg-1">
                    <div class="course-cat-icon">
                        <img src="/images/icon/icon1.png" alt="" class="img-fluid">
                    </div>
                    <div class="course-cat-content">
                        <h4 class="course-cat-title">
                            <a href="#">Print On demand Full course</a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-sm-6">
                <div class="single-course-category style-3 bg-2">
                    <div class="course-cat-icon">
                        <img src="/images/icon/icon2.png" alt="" class="img-fluid">
                    </div>
                    <div class="course-cat-content">
                        <h4 class="course-cat-title">
                            <a href="#">Facebook paid marketing</a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-sm-6">
                <div class="single-course-category style-3 bg-3">
                    <div class="course-cat-icon">
                        <img src="/images/icon/icon3.png" alt="" class="img-fluid">
                    </div>
                    <div class="course-cat-content">
                        <h4 class="course-cat-title">
                            <a href="#">Print On demand free marketing</a>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="col-xl col-lg-4 col-sm-6">
                <div class="single-course-category style-3 bg-4">
                    <div class="course-cat-icon">
                        <img src="/images/icon/icon4.png" alt="" class="img-fluid">
                    </div>
                    <div class="course-cat-content">
                        <h4 class="course-cat-title">
                            <a href="#">Print On demand Graphic design
</a>
                        </h4>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
<!--  Course category End -->




<!-- Work Process Section Start -->
<section class="work-process section-padding">
    <div class="container">
        <div class="row mb-40">
            <div class="col-xl-8">
                <div class="section-heading ">
                    <h2 class="font-lg">Start your journey With us</h2>
                    <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam</p>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-xl-7 pe-xl-5 col-lg-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="step-item ">
                            <div class="step-number bg-1">01</div>
                            <div class="step-text">
                                <h5>Signup with all info</h5>
                                <p>Lorem ipsum dolor seat ameat dui too consecteture elite adipaising.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="step-item">
                            <div class="step-number bg-2">02</div>
                            <div class="step-text">
                                <h5>Take your Admission</h5>
                                <p>Lorem ipsum dolor seat ameat dui too consecteture elite adipaising.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xl-6 col-lg-6 col-md-6 ">
                        <div class="step-item">
                            <div class="step-number bg-3">03</div>
                            <div class="step-text">
                                <h5>Learn from online </h5>
                                <p>Lorem ipsum dolor seat ameat dui too consecteture elite adipaising.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="step-item">
                            <div class="step-number bg-1">04</div>
                            <div class="step-text">
                                <h5>Start your pod business</h5>
                                <p>Lorem ipsum dolor seat ameat dui too consecteture elite adipaising.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5">
                <div class="video-section mt-3 mt-xl-0">
                    <div class="video-content">
                        <img src="{{asset('/images/bg/office01.jpg')}}" alt="" class="img-fluid">
                        <a href="#" class="video-icon video-popup"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Work Process Section End -->




<!-- Feature section start -->
<section class="features-3 section-padding-top ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="section-heading mb-50 text-center">
                    <h2 class="font-lg">Transform Your Life </h2>
                    <p>Discover Your Perfect Program In Our Courses.</p>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-3 col-md-6 col-xl-3 col-sm-6">
                <div class="feature-item feature-style-top hover-shadow rounded border-0">
                    <div class="feature-icon">
                        <i class="flaticon-teacher"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Expert Teacher</h4>
                        <p>Develop skills for career of various majors including computer</p>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 col-xl-3 col-sm-6">
                <div class="feature-item feature-style-top hover-shadow rounded border-0">
                    <div class="feature-icon">
                        <i class="flaticon-layer"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Self Development</h4>
                        <p>Develop skills for career of various majors including computer.</p>
                    </div>
                </div>
            </div>
             <div class="col-lg-3 col-md-6 col-xl-3 col-sm-6">
                <div class="feature-item feature-style-top hover-shadow rounded border-0">
                    <div class="feature-icon">
                        <i class="flaticon-video-camera"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Remote Learning</h4>
                        <p>Develop skills for career of various majors including language</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-xl-3 col-sm-6">
                <div class="feature-item feature-style-top hover-shadow rounded border-0">
                    <div class="feature-icon">
                        <i class="flaticon-lifesaver"></i>
                    </div>
                    <div class="feature-text">
                        <h4>Life Time Support</h4>
                        <p>Develop skills for career of various majors including language  </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature section End -->
<!-- InstructorsSection Start -->
<section class="be-instructor section-padding-btm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6">
                <img src="{{asset('/images/kmnazrul.jpg')}}" alt="" class="img-fluid">
             </div>

            <div class="col-xl-6 col-lg-6">
                <div class="section-heading mt-4 mt-lg-0">
                    <span class="subheading">Here i am,</span>
                    <h2 class="font-lg mb-20">K M NAZRUL ISLAM </h2>
                    <p class="mb-20">A Print On Demand Professional. 
I have been working as a full-time print-on-demand marketer
and designer since 2017.
last five years, I have had a digital marketing agency 
km360digital and worked as a print On demand mentor.</p>
                    
                       
                    <a href="https://www.facebook.com/groups/printondemand.km" class="btn btn-main rounded" >Join my facebook praivate group</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Instructors Section End -->





<!-- Testimonial section start -->
<section class="testimonial-4 section-padding bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="section-heading text-center mb-50">
                    <h2 class="font-lg">Our Students Says</h2>
                    <p>Discover Your Perfect Program In Our Courses.</p>
                </div>
            </div>
        </div>
<div class="row align-items-center">
            <div class="col-lg-12 col-xl-12">
                <div class="testimonials-slides owl-carousel owl-theme">
                    <div class="testimonial-item">
                       <div class="testimonial-inner">
                           <img src="{{asset('images/clients/1.jpg')}}" alt="" class="img-fluid">
                       </div>
                    </div>
                    <div class="testimonial-item">
                       <div class="testimonial-inner">
                           <img src="{{asset('images/clients/2.jpg')}}" alt="" class="img-fluid">
                       </div>
                    </div>
                    <div class="testimonial-item">
                       <div class="testimonial-inner">
                           <img src="{{asset('images/clients/3.jpg')}}" alt="" class="img-fluid">
                       </div>
                    </div>
                </div>
            </div>
        </div>    </div>
</section>
<!-- Testimonial section End -->
<!-- CTA Sidebar start -->
<section class="cta-5 mb--120 bg-gray">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="cta-inner4">
                    <div class="row align-items-center justify-content-center">
                        <div class="col-xl-4 col-lg-5">
                           <div class="cta-img mb-4 mb-lg-0">
                               <img src="{{asset('/images/about/img_9.png')}}" alt="" class="img-fluid">
                           </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="cta-content ps-lg-4">
                                <span class="subheading mb-10">Not sure where to start?</span>
                                <h2 class="mb-20"> Want to know Special Offers & Updates of new courses?</h2>
                                <a href="#" class="btn btn-main rounded"> Join NOw</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- CTA Sidebar end -->

@endsection