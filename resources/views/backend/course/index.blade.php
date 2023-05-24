@extends('backend.layout.template_backend')
@section('content')
<div class="modal fade" id="addmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
   <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Add New Course</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{route('courseStore')}}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="modal-body">
               <div >
                  <label class="from-label mb-3 " for="title"> Title </label>
                  <input type="text" placeholder="title" class="form-control form-control-sm mb-3" name="title" id="title">
               </div>
               <div>
                  <label class="from-label mb-3" for="category"> Category </label>
                  <select  class="form-control form-control-sm mb-3" id="category" name="category">
                     @foreach(App\Models\Categories::get() as $category)
                     <option value="{{$category->id}}">{{$category->category_name}}</option>
                     @endforeach
                  </select>
               </div>
               <div>
                  <label class="from-label mb-3" for="description"> Overview </label>
                  <textarea class="form-control mb-3 " name="overview"  id="overview"></textarea>
               </div>
               <div>
                  <label class="from-label mb-3" for="description"> Description </label>
                  <textarea class="form-control mb-3 ckeditor" name="description"  id="description"></textarea>
               </div>
               <div>
                  <label for="status" class="from-label mb-3">Featured:</label>
                  <select  class="form-control form-control-sm mb-3" id="featured" name="featured">
                     <option value="YES">Yes</option>
                     <option value="NO">No</option>
                  </select>
               </div>
               <div>
                  <label for="level" class="from-label mb-3">Level:</label>
                  <select  class="form-control form-control-sm mb-3" id="level" name="level">
                     <option value="Beginnner">Beginnner</option>
                     <option value="Intermediate">intermediate</option>
                     <option value="Expert">Expert</option>
                  </select>
               </div>
               <div>
                  <label class="from-label mb-3" for="duration"> Duration </label>
                  <input type="text" placeholder="duration" class="form-control form-control-sm mb-3" name="duration" id="duration">
               </div>
               <div>
                  <label class="form-label mb-3" for="lectures"> Lectures </label>
                  <input type="text" placeholder="lectures" class="form-control form-control-sm mb-3" name="lectures" id="lectures">
               </div>
               <div>
                  <label class="form-label mb-3" for="amount"> Amount </label>
                  <input type="text" placeholder="amount" class="form-control form-control-sm mb-3" name="amount" id="amount">
               </div>
               <div>
                  <label for="status mb-3" class="form-label mb-3">Status:</label>
                  <select  class="form-control form-control-sm mb-3" id="status" name="status">
                     <option value="Yes">Active</option>
                     <option value="NO">Inactive</option>
                  </select>
               </div>
                <div>
                    <label class="form-label mb-3" for="">Course Thumbnail (340X223)</label>
                    <input type="file" class="form-control form-control-sm" id="image" name="image"  >
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
   <h1 class="h2">Course's</h1>
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
         <th data-priority="3">Overview</th>
        <th data-priority="3">Description</th>
        <th data-priority="3">Level</th>
         <th data-priority="4">Duration</th>
         <th data-priority="5">Lectures</th>
         <th data-priority="6">Amount</th>
         <th data-priority="7">Featured</th>
         <th data-priority="8">Status</th>
         <th data-priority="9">image</th>
         <th data-priority="10">Action</th>
      </tr>
   </thead>
   <tbody>
      @foreach($courses as $course)
      <tr>
         <td>{{$loop->index+1}}</td>
         <td>{{$course->title}}</td>
         <td>{{$course->overview}}</td>
         <td>{!! $course->description !!}</td>
         <td>{{$course->level}}</td>
         <td>{{$course->course_duration}}</td>
         <td>{{$course->lectures}}</td>
         <td>{{$course->amount}}</td>
         <td>{{$course->featured}}</td>
         <td>{{$course->active}}</td>
         <td><img src="{{asset('/images/course')}}/{{$course->image}}" class="img-thumbnail" width="150px"></td>
         <td>
            <div class="btn-group" role="group" aria-label="Basic example">
               <a class="btn btn-sm btn-outline-secondary" href="{{route('course_update',$course->id)}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>

               <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" href="#deletemodal{{$course->id}}"    role="button"><i class="fa fa-times" aria-hidden="true"></i></a>

            </div>
            
            <div class="modal fade" id="deletemodal{{$course->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
               <div class="modal-dialog modal-xl modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{$course->title}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="{{route('courseDelete',$course->id)}}" method="post">
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

