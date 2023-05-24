

@extends('backend.layout.template_backend')
@section('content')
<div class="modal fade" id="addmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
   <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Add New Class</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('classStore')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
               <div>
                  <label class="form-label mb-3" for="title"> Title </label>
                  <input type="text" placeholder="title" class="form-control  form-control-sm" name="title" id="title">
               </div>
               <div>
                  <label class="form-label mb-3">Class Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
               </div>
               <div>
                  <label class="form-label mb-3" for="category"> Section </label>
                  <select  class="form-control form-control-sm" id="section_id" name="course_id">
                     @foreach(App\Models\Section::get() as $section)
                     <option value="{{$section->id}}">{{$section->title}} ## {{find_a_field('courses','title','id='.$section->course_id)}}</option>
                     @endforeach
                  </select>
               </div>
               <div>
                  <label class="form-label mb-3" for="category"> Course </label>
                  <select  class="form-control form-control-sm" id="course_id" name="course_id">
                     @foreach(App\Models\Course::get() as $course)
                     <option value="{{$course->id}}">{{$course->title}}</option>
                     @endforeach
                  </select>
               </div>
               <div class="form-group">
                  <label for="status" class="">Featured:</label>
                  <select  class="form-control form-control-sm" id="featured" name="featured">
                     <option value="YES">Yes</option>
                     <option value="NO">No</option>
                  </select>
               </div>
               <div class="form-group">
                  <label for="status" class="">Class Type:</label>
                  <select  class="form-control form-control-sm" id="class_type" name="class_type" required>
                     <option value="Video">Video</option>
                     <option value="File">File</option>
                     <option value="Link">Link</option>
                  </select>
               </div>
               <div>
                    <label class="form-label mb-3" for="">File (PDF)</label>
                    <input type="file" class="form-control form-control-sm" id="file_link" name="file_link">
                </div>
               <div>
                  <label class="form-label mb-3" for="video_link"> Video Link </label>
                  <input type="text" placeholder="video_link" class="form-control  form-control-sm" name="video_link" id="video_link">
               </div>
               <div>
                  <label class="form-label mb-3" for="duration"> Duration </label>
                  <input type="text" placeholder="duration" class="form-control  form-control-sm" name="duration" id="duration">
               </div>
               <div>
                  <label class="form-label mb-3" for="priority"> Priority </label>
                  <input type="number" placeholder="priority" class="form-control  form-control-sm" name="priority" id="priority">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
         </form>
      </div>
   </div>
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
   <h1 class="h2">Class's</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
      <div class="btn-group me-2">
         <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" href="#addmodal" role="button">Add new</a>
      </div>
   </div>
</div>
<table  data-toggle="table"
   data-pagination="true"
   data-search="true" >
   <thead>
    <tr>
       <th data-priority="1">Sl</th>
       <th data-priority="2">Title</th>
       <th data-priority="3">Section</th>
       <th data-priority="4">Course</th>
       <th data-priority="5">Featured</th>
       <th data-priority="6">Class Type</th>
       <th data-priority="6">File Link</th>
       <th data-priority="7">Video Link</th>
       <th data-priority="8">Duration</th>
       <th data-priority="9">Priority</th>
       <th data-priority="10">Action</th>
    </tr>
 </thead>
 <tbody>
    @foreach($classes as $cls)
    <tr>
       <td>{{$loop->index+1 }}</td>
       <td>{{$cls->title}}</td>
       <td>{{ find_a_field('sections','title','id='.$cls->section_id) }}</td>
       <td>{{ find_a_field('courses','title','id='.$cls->course_id) }}</td>
       
       <td>{{$cls->featured}}</td>
       <td>{{$cls->class_type}}</td>
       <td>{{$cls->file_link}}</td>
       <td>{{$cls->video_link}}</td>
       <td>{{$cls->duration}}</td>
       <td>{{$cls->priority}}</td>
         <td>
            <div class="btn-group" role="group" aria-label="Basic example">
               <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" href="#editmodal{{$cls->id}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
               <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" href="#deletemodal{{$cls->id}}"    role="button"><i class="fa fa-times" aria-hidden="true"></i></a>
            </div>
            <div class="modal fade" id="editmodal{{$cls->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
               <div class="modal-dialog modal-xl modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ $cls->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="{{route('classEdit',$cls->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div>
                                <label class="form-label mb-3" for="title"> Title </label>
                                <input type="text" placeholder="title" class="form-control form-control-sm" name="title" id="title" value="{{$cls->title}}">
                             </div>
                             
                             
                                    
                            <div>
                              <label class="form-label mb-3">Class Description</label>
                              <textarea class="form-control" id="description" name="description" rows="3">{{$cls->description}}</textarea>
                            </div>
                                         
                             <div>
                                <label class="form-label mb-3" for="category"> Section </label>
                                <select  class="form-control form-control-sm" id="section_id" name="section_id">
                                  {{ foreign_relation('sections','id','title',$cls->section_id,'1') }}
                                </select>
                             </div>
                             <div>
                                <label class="form-label mb-3" for="category"> Course </label>
                                <select  class="form-control form-control-sm" id="course_id" name="course_id">
                                {{ foreign_relation('courses','id','title',$cls->course_id,'1') }}
                                </select>
                             </div>
                             <div class="form-group">
                                          <label for="status" class="">Featured:</label>
                                          <select  class="form-control form-control-sm" id="featured" name="featured">
                                              <option value="YES" {{$cls->featured=="YES" ? 'selected' : ''  }}>Yes</option>
                                              <option value="NO" {{$cls->featured=="YES" ? 'selected' : ''  }}>No</option>
                                          </select>
                                      </div>
                                      
                                      <div class="form-group">
                  <label for="status" class="">Class Type:</label>
                  <select  class="form-control form-control-sm" id="class_type" name="class_type" required>
                     <option value="Video" {{$cls->class_type=="Video" ? 'selected' : ''  }} >Video</option>
                     <option value="File" {{$cls->class_type=="File" ? 'selected' : ''  }}>File</option>
                     <option value="Link" {{$cls->class_type=="Link" ? 'selected' : ''  }}>Link</option>
                  </select>
               </div>
               
               <div>
                    <label class="form-label mb-3" for="">File (PDF)</label>
                    <input type="file" class="form-control form-control-sm" id="file_link" name="file_link">
                </div>
                                      <div>
                                <label class="form-label mb-3" for="video_link"> Video Link </label>
                                <input type="text" placeholder="video_link" class="form-control form-control-sm" name="video_link" id="video_link" value="{{$cls->video_link}}">
                             </div><div>
                                <label class="form-label mb-3" for="duration"> Duration </label>
                                <input type="text" placeholder="duration" class="form-control form-control-sm" name="duration" id="duration" value="{{$cls->duration}}">
                             </div>
                             <div>
                                <label class="form-label mb-3" for="priority"> Priority </label>
                                <input type="number" placeholder="priority" class="form-control form-control-sm" name="priority" id="priority" value="{{$cls->priority}}">
                             </div>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
            <div class="modal fade" id="deletemodal{{$cls->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
               <div class="modal-dialog modal-xl modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{$cls->title}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="{{route('classDelete',$cls->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                           <p>Do you really want to delete these records? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </td>
      </tr>
      @endforeach
   </tbody>
</table>
@endsection

