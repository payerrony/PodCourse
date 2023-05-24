@php
    foreach($watchHistory as $watch){
        $is_watched[$watch->class_id]=$watch->class_id;

    }
@endphp







@extends('layout.template')
@section('content')
<section class="course-page-header  page-header-3">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-xl-8">
              <div class="course-header-wrapper mb-0 bg-transparent">
                  <h1 class="mb-3">{{$courses->title}}</h1>
                    <p>{{$courses->overview}}
                    </p>
                    
                    <div class="course-header-meta">
                        <ul class="inline-list list-info">
                            
                            @php
                                $no_std = find_a_field('sales','count(id)','course_id='.$courses->id);
                            @endphp
                            
                            <li>
                            @if($no_std)
                                <i class="fa fa-user me-2"></i> {{$no_std}} Enrolled students
                            
                            @endif
                            
                            
                            </li>
                        </ul>
                    </div>
              </div>
          </div>
      </div>
    </div>
</section>

<section class="tutori-course-single tutori-course-layout-3 page-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-7">
                <div class="single-course-details mb-4">
                    {!!$courses->description!!}
                </div>
<div class="tutori-course-curriculum" >
    <div class="curriculum-scrollable">
        <ul class="curriculum-sections">
            @foreach(App\Models\Section::orderBY('priority','asc')->where('course_id',$courses->id)->get() as $sec)
                <li class="section">
                <div class="section-header">
                    <div class="section-left">
                        <h5 class="section-title">{{$sec->title}}</h5>
                    </div>
                </div>
  
                <ul class="section-content">
                    
                 @foreach(App\Models\Classes::orderBY('priority','asc')->where('section_id',$sec->id)->get() as $cls)   
                    
                    <li class="course-item has-status course-item-lp_lesson">
                      <a class="section-item-link" href="{{route('coursewatch',$cls->id)}}">
                        <span class="item-name">{{$cls->title}}</span>
                        <div class="course-item-meta">
                            @if(!empty($is_watched))
                                @if(in_array($cls->id,$is_watched))
                                <span class="item-meta duration">Completed</span>
                                @endif
                            @endif
                        </div>
                      </a>
                    </li>
                @endforeach
                </ul>
            </li>
            @endforeach

        </ul>
        <!-- Main ul end -->
    </div>
</div>

</div>

<div class="col-xl-4 col-lg-5">
                     <!-- Course Sidebar start -->
     <div class="course-sidebar course-sidebar-3 mt-5 mt-lg-0">
        <div class="course-widget course-details-info ">
            <div class="course-thumbnail">
                <img src="assets/images/course/img_02.jpg" alt="" class="img-fluid w-100">
            </div>

            <div class="course-sidebar-details">
                <div class="price-header">
                    <h2 class="course-price">&#2547; {{$courses->amount}}<span></span></h2>
                    <!--<span class="course-price-badge onsale">39% off</span>-->
                </div>
                <ul class="course-sidebar-list">
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="far fa-sliders-h"></i>Level</span>
                            {{$courses->level}}
                        </div>
                    </li>
        
                     <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-play-circle"></i>Lectures</span>
                            {{$courses->lectures}}
                        </div>
                    </li>
                     <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="far fa-user"></i>Students</span>
                            {{$no_std}}
                        </div>
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="far fa-clock"></i>Duration</span>
                           {{$courses->course_duration}}
                        </div>
                    </li>
                        
        
                    <li>
                        <div class="d-flex justify-content-between align-items-center">
                            <span><i class="far fa-calendar"></i>Updated </span>
                            {{date('M-d,Y',strtotime($courses->updated_at))}}
                        </div>
                    </li>
                </ul>
    
                <div class="buy-btn">
                    <button class="button button-enroll-course btn btn-main rounded">
                        <i class="far fa-shopping-cart me-2"></i> Enroll Course 
                    </button>
                </div>
    
                <!--<div class="course-meterial">
                    <h4 class="mb-3">Material Includes</h4>
                    <ul class="course-meterial-list">
                        <li><i class="fal fa-long-arrow-right"></i>Videos</li>
                        <li><i class="fal fa-long-arrow-right"></i>Files For Development</li>
                        <li><i class="fal fa-long-arrow-right"></i>Documentation Files</li>
                    </ul>
                </div>-->
            </div>
        </div>
    </div>
    <!-- Course Sidebar end -->

           </div>
        </div>
    </div>
</section>
@endsection