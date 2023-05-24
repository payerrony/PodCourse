@extends('backend.layout.template_backend')
@section('content')

               <div class="card mt-5">
                  
                     <div class="card-header">
                        <h5 class="card-title" id="exampleModalToggleLabel">{{$course->title}}</h5>
                     </div>
                     <form action="{{route('courseEdit',$course->id)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        <div class="card-body">
                           <div >
                              <label class="from-label mb-3 " for="title"> Title </label>
                              <input type="text" placeholder="title" class="form-control form-control-sm mb-3" name="title" id="title" value="{{$course->title}}">
                           </div>
                           <div>
                              <label class="from-label mb-3" for="category"> Category </label>
                              <select  class="form-control form-control-sm mb-3" id="category" name="category">
                              {{ foreign_relation('categories','id','category_name',$course->category_id,'1') }}
                              </select>
                           </div>
                           
                           <div>
                              <label class="from-label mb-3" for="description"> Overview </label>
							   <textarea class="form-control mb-3"   name="overview"  id="overview">{{$course->overview}}</textarea>
                           </div>
                           <div>
                              <label class="from-label mb-3" for="description"> Description </label>
							   <textarea class="form-control mb-3 ckeditor"   name="description"  id="description">{!! $course->description !!}</textarea>
							   <script type="text/javascript">
      								$('#ckeditor{{$course->id}}').ckeditor();         
   								</script>
                           </div>
                           <div>
                              <label for="status" class="from-label mb-3">Featured:</label>
                              <select  class="form-control form-control-sm mb-3" id="featured" name="featured">
                              <option value="YES" {{$course->featured=="YES" ? 'selected' : ''  }} >Yes</option>
                              <option value="NO" {{$course->featured=="NO" ? 'selected' : ''  }} >No</option>
                              </select>
                           </div>
                           <div>
                  <label for="level" class="from-label mb-3">Level:</label>
                  <select  class="form-control form-control-sm mb-3" id="level" name="level">
                     <option value="Beginnner" {{$course->featured=="Beginnner" ? 'selected' : ''  }}  >Beginnner</option>
                     <option value="Intermediate" {{$course->featured=="Intermediate" ? 'selected' : ''  }}>intermediate</option>
                     <option value="Expert" {{$course->featured=="Expert" ? 'selected' : ''  }}  >Expert</option>
                  </select>
               </div>
                           
                           <div>
                              <label class="from-label mb-3" for="duration"> Duration </label>
                              <input type="text" placeholder="duration" class="form-control form-control-sm mb-3" name="duration" id="duration" value="{{$course->duration}}">
                           </div>
                           <div>
                              <label class="form-label mb-3" for="lectures"> Lectures </label>
                              <input type="text" placeholder="lectures" class="form-control form-control-sm mb-3" name="lectures" id="lectures" value="{{$course->lectures}}">
                           </div>
                           <div>
                              <label class="form-label mb-3" for="amount"> Amount </label>
                              <input type="text" placeholder="amount" class="form-control form-control-sm mb-3" name="amount" id="amount" value="{{$course->amount}}">
                           </div>
                           <div>
                              <label for="status mb-3" class="form-label">Status:</label>
                              <select  class="form-control form-control-sm mb-3" id="status" name="status">
                              <option value="Yes" {{$course->active=="YES" ? 'selected' : ''  }}>Active</option>
                              <option value="NO" {{$course->active=="NO" ? 'selected' : ''  }} >Inactive</option>
                              </select>
                           </div>
                           <div>
                                <label class="form-label mb-3" for="">Course Thumbnail (340X223)</label>
                                <input type="file" class="form-control form-control-sm" id="image" name="image" value="{{$course->image}}"  >
                            </div>
                        </div>
                        <div class="modal-footer">
                           <a href="{{route('course_index')}}" class="btn btn-secondary">Close</a>
                           <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                     </form>
                  
              </div>
            
@endsection

