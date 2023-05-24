@extends('layout.template')

@section('content')



<section class="page-header">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-8">
          <div class="title-block">
            <h1>About Us</h1>
            <ul class="header-bradcrumb justify-content-center">
              <li><a href="{{route('welcome')}}">Home</a></li>
              <li class="active" aria-current="page">About</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
</section>

<!-- About Section Start -->
<section class="about-3 section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-xl-4 col-lg-5">
                <div class="about-img">
                    <img src="{{asset('images/banner/img_9.png')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-xl-7 col-lg-7">
                <div class="about-content mt-5 mt-lg-0">
                    <div class="heading mb-50">
                        <span class="subheading">5 years Glory of success</span>
                        <h2 class="font-lg">Some reasons why start your online learning with us</h2>
                    </div>

                    <div class="about-features">
                        <div class="feature-item feature-style-left">
                            <div class="feature-icon icon-bg-3 icon-radius">
                                <i class="fa fa-video"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Online Classes</h4>
                                <p>২০২২ এর মত সময়ে এসে অবশ্যই আমরা এখন আগের থেকে আরও অনেক স্মার্ট এবং উদ্যমী, আমরা আমাদের সময়ের মূল্য জানি। আমরা এখন আর আগের মত কোচিং সেন্টার এ গিয়ে সময় নষ্ট করার মানসিকতায় নাই।
এখন আমরা আমাদের রেগুলার জীবন এবং কাজ এর পাশাপাশি এক্সট্রা উপার্জন এর জন্য যে কোন জায়গায় বসে আমাদের শিখার কাজটি সম্পূর্ণ করতে পারব। সম্পূর্ণ শিখার বিষয়টা আপনি যে কোন জায়গায় বসে অনলাইন এর মাধ্যমেই সম্পূর্ণ করতে পারবেন। কোন রকম এক্সট্রা সময় নষ্ট করা লাগবে না, জ্যাম এ বসে সময় নষ্ট করে ক্লাস এ যাওয়া লাগবে না এবং এক্সট্রা পকেট খরচ লাগবে না।</p>
                            </div>
                        </div>

                        <div class="feature-item feature-style-left">
                            <div class="feature-icon icon-bg-2 icon-radius">
                                <i class="far fa-file-certificate"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Skilled Instructors</h4>
                                <p>বাংলাদেশ এর বেশিরভাগ মেন্টর নিজে কাজ করে না কিন্তু সব শিখায়। আমাদের এই ওয়েবসাইট এর সব মেন্টর নিজে কাজ করেন এবং রেগুলার প্রাকটিস করেন। যা নিজে করেন তাই আপনাদের শিখানোর চেষ্টা করেন। তাই আপনি এই ওয়েবসাইট থেকে দক্ষ প্রশিক্ষক
থেকে শিখতে পারবেন।</p>
                            </div>
                        </div>
                        
                        <div class="feature-item feature-style-left">
                            <div class="feature-icon icon-bg-1 icon-radius">
                                <i class="fad fa-users"></i>
                            </div>
                            <div class="feature-text">
                                <h4>Support from mentor</h4>
                                <p>বেশিরভাগ কোর্স করে আপনি মেন্টরকে খুজেও পাবেন না। কিন্তু আমাদের ওয়েবসাইট এর সকল মেন্টর আপনাকে হেল্প করার জন্য সর্বদা প্রস্তুত। আমাদের সাপোর্ট এর  জন্য আছে ফেসবুক পেজ এবং ডেডিকেটেড ফেসবুক গ্রুপ। যেখানে আপনার মতই আরও অনেক
শিক্ষার্থী রয়েছে। যার মাধ্যমে আপনি আরও বেশি বেশি জানতে পারবেন এবং শিখতে পারবেন</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section END -->
<!-- InstructorsSection Start -->
<section class="instructors section-padding-btm">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 pe-5">
                <div class="section-heading">
                    <span class="subheading">Start Today</span>
                    <h2 class="font-lg mb-20">Our Top Successful Students.</h2>
                    <p class="mb-30">Do you want to be an instructor? Do you want to share your knowledge with everyone? If you have any skill then you can easily 
                        share your knowledge online or offline  through iLive platform & make money.</p>
                       
                    <ul class="list-item mb-40">
                        <li><i class="fa fa-check"></i><h5>Develop your skills Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5></li>
                        <li><i class="fa fa-check"></i><h5>Share your knowledge Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5></li>
                        <li><i class="fa fa-check"></i><h5>Earn from globally Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5></li>
                    </ul>
                    
                </div>
            </div>

            <div class="col-xl-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="team-item team-item-2 mt-5">
                            <div class="team-img">
                                <img src="{{asset('/images/team/team-4.jpg')}}" alt="" class="img-fluid">
        
                                
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h4>Md Emran Hossain</h4>
                                </div>
        
                                
                            </div>
                        </div>

                        <div class="team-item team-item-2">
                            <div class="team-img">
                                <img src="{{asset('/images/team/team-1.jpg')}}" alt="" class="img-fluid">
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h4>Md Mahabub Hasan Rumon</h4>
                                    
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="team-item team-item-2">
                            <div class="team-img">
                                <img src="{{asset('/images/team/team-2.jpg')}}" alt="" class="img-fluid">
        
                                
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h4>S M Sofeul Azom</h4>
                                    
                                </div>
                               
                            </div>
                        </div>


                        <div class="team-item team-item-2">
                            <div class="team-img">
                                <img src="{{asset('/images/team/team-3.jpg')}}" alt="" class="img-fluid">
        
                                
                            </div>
                            <div class="team-content">
                                <div class="team-info">
                                    <h4>Farhan Tusar</h4>
                                    
                                </div>
        
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Instructors Section End -->
<!-- Counter Section start -->
<section class="counter-section4">
    <div class="container">
        <div class="row justify-content-center" >
            <div class="col-xl-12 counter-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item mb-5 mb-lg-0">
                            <div class="count">
                                <span class="counter h2">2000</span><span>+</span>
                            </div>
                            <p>Students</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item mb-5 mb-lg-0">
                            <div class="count">
                                <span class="counter h2">1200</span>
                            </div>
                            <p>Online Courses</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item mb-5 mb-lg-0">
                            <div class="count">
                                <span class="counter h2">2256</span>
                            </div>
                            <p>Finished Seasons</p>     
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
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
                           <img src="{{asset('/images/clients/1.jpg')}}" alt="" class="img-fluid">
                       </div>
                    </div>
                    <div class="testimonial-item">
                       <div class="testimonial-inner">
                           <img src="{{asset('/images/clients/2.jpg')}}" alt="" class="img-fluid">
                       </div>
                    </div>
                    <div class="testimonial-item">
                       <div class="testimonial-inner">
                           <img src="{{asset('/images/clients/3.jpg')}}" alt="" class="img-fluid">
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial section End -->
<!-- Work Process Section Start -->
<section class="work-process section-padding">
    <div class="container">
        <div class="row mb-70 justify-content-between">
            <div class="col-xl-5 col-lg-6">
                <div class="section-heading mb-4 mb-xl-0">
                    <span class="subheading">How to Start</span>
                    <h2 class="font-lg">4 steps start your journey with us</h2>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <p>Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Etiam porta sem malesuada magna mollis euismod. 
                    Nullam id dolor id nibh ultricies vehicula ut id elit. Nullam quis risus eget urna mollis.</p>
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
        
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="step-item ">
                            <div class="step-number bg-3">03</div>
                            <div class="step-text">
                                <h5>Learn from online </h5>
                                <p>Lorem ipsum dolor seat ameat dui too consecteture elite adipaising.</p>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="step-item ">
                            <div class="step-number bg-1">04</div>
                            <div class="step-text">
                                <h5>Get certificate</h5>
                                <p>Lorem ipsum dolor seat ameat dui too consecteture elite adipaising.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-lg-12">
                <div class="video-section mt-5 mt-xl-0">
                    <div class="video-content">
                        <img src="{{asset('images/bg/office01.jpg')}}" alt="" class="img-fluid">
                        <a href="#" class="video-icon video-popup"><i class="fa fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Work Process Section End -->

@endsection