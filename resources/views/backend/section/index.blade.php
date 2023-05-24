@extends('backend.layout.template_backend')
@section('content')
<div class="modal fade" id="addmodal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
   <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Add New Section</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form action="{{ route('sectionStore') }}" method="post">
            @csrf
            <div class="modal-body">
                <div>
                    <label class="form-label mb-3" for="title"> Title </label>
                    <input type="text" placeholder="title" class="form-control " name="title" id="title">
                 </div>
                 <div>
                    <label class="mb-0" for="category"> Course </label>
                    <select  class="form-control form-control-sm" id="course_id" name="course_id">
                       @foreach(App\Models\Course::get() as $course)
                       <option value="{{$course->id}}">{{$course->title}}</option>
                       @endforeach
                    </select>
                 </div>
                 <div>
                    <label class="mb-0" for="priority"> Priority </label>
                    <input type="number" placeholder="priority" class="form-control " name="priority" id="priority">
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
   <h1 class="h2">Section's</h1>
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
       <th data-priority="3">Course</th>
       <th data-priority="4">Priority</th>
       <th data-priority="5">Action</th>
    </tr>
 </thead>
 <tbody>
    @foreach($sections as $section)
    <tr>
       <td>{{$loop->index+1 }}</td>
       <td>{{$section->title}}</td>
       <td>{{ find_a_field('courses','title','id='.$section->course_id) }}</td>
       <td>{{$section->priority}}</td>
         <td>
            <div class="btn-group" role="group" aria-label="Basic example">
               <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" href="#editmodal{{$section->id}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>

               <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" href="#deletemodal{{$section->id}}"    role="button"><i class="fa fa-times" aria-hidden="true"></i></a>

            </div>
            <div class="modal fade" id="editmodal{{$section->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
               <div class="modal-dialog modal-xl modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{ $section->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="{{route('sectionEdit',$section->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                <div>
                    <label class="form-label mb-3" for="title"> Title </label>
                    <input type="text" placeholder="title" class="form-control " name="title" id="title" value="{{ $section->title }}">
                 </div>
                 <div>
                    <label class="mb-0" for="category"> Course </label>
                    <select  class="form-control form-control-sm" id="course_id" name="course_id">
                        {{ foreign_relation('courses','id','title',$section->course_id,'1') }}
                    </select>
                 </div>
                 <div>
                    <label class="mb-0" for="priority"> Priority </label>
                    <input type="number" placeholder="priority" class="form-control " name="priority" id="priority" value="{{ $section->priority }}"> 
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
            



            <div class="modal fade" id="deletemodal{{$section->id}}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
               <div class="modal-dialog modal-xl modal-dialog-centered">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel">{{$section->title}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <form action="{{route('sectionDelete',$section->id)}}" method="post">
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

