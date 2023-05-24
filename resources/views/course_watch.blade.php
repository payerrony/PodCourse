@extends('layout.template')
@section('content')

<section class="work-process mt-5">
    <div class="container">

        <div class="row">
            <div class="col-8 mb-2">
                <div class="col">
                    <h3>{{$class->title}}</h3>
                </div>
                

                <div class="embed-responsive embed-responsive-16by9">
                    
                @if($class->class_type=='Video')    
                <iframe   class="embed-responsive-item" src="https://player.vimeo.com/video/{{$class->video_link}}" allowfullscreen width="100%" style="min-height:500px;"></iframe>
                @elseif($class->class_type=='File')
                    <iframe   class="embed-responsive-item" src="{{asset('/file')}}/{{$class->file_link}}" allowfullscreen width="100%" style="min-height:500px;"></iframe>
                    
                @elseif($class->class_type=='Link')
                  <div class="mt-5 mb-5">  
                <button class="button button-enroll-course btn btn-success rounded w-100">
                     <a href="{{$class->video_link}}" target="_blank">Click Here.</a>
                    </button>
                    </div>
                @endif
</div>

  <form action="{{route('markComplete')}}" method="post" enctype="multipart/form-data" >
            @csrf

            <div class="col-12 ">
                
                
              
                    <input type="hidden" name="class_id" id="class_id" value="{{$class->id}}" >
                    <input type="hidden" name="course_id" id="course_id" value="{{$course->id}}" >
                    <button class="button button-enroll-course btn btn-info rounded w-100">
                     Mark As Complete 
                    </button>
                    
                    
          
                
                
            </div>
              </form
            </div>
   


        </div>
        <div class="col-4" style="max-height:500px;overflow-x:hidden">
                <div class="accordion" id="accordionExample">
                    
@foreach(App\Models\Section::orderBY('priority','asc')->where('course_id',$course->id)->get() as $sec)
                    <div class="accordion-item">
    <h5 class="accordion-header" id="">
        
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$sec->id}}" aria-expanded="true" aria-controls="collapseOne">
          {{$sec->title}}
      </button>
      
    </h5>
    <div id="collapse{{$sec->id}}" class="accordion-collapse collapse @php if($class->section_id==$sec->id) echo 'show'; else  echo '';    @endphp " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
          <ul class="list-group">
        @foreach(App\Models\Classes::orderBY('priority','asc')->where('section_id',$sec->id)->get() as $cls) 
        
                   
                    
                    <li class="list-group-item {{ ($class_id==$cls->id) ? 'active' : '' }}">
                      <a class="section-item-link" href="{{route('coursewatch',$cls->id)}}">
                        <span class="item-name">{{$loop->index+1}}. {{$cls->title}} {!!
                          $class->watchHistory->where('class_id',$cls->id)->count()>0 ? '<i class="fa fa-check-circle"></i>' : ''
                        !!} 
                        
                        
                        </span>
                        
                      </a>
                    </li>
                @endforeach
                </ul>
      </div>
    </div>
  </div>
  @endforeach

</div>
            </div>
    </div>
</section>

@endsection