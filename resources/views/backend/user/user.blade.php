@extends('backend.layout.template_backend')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ">
   <h1 class="h2">User's</h1>
</div>
<table  data-toggle="table"
   data-pagination="true"
   data-search="true" >
   <thead>
    <tr>
       <th data-priority="1">Sl</th>
       <th data-priority="2">Name</th>
       <th data-priority="3">Email</th>
    </tr>
 </thead>
 <tbody>
    @foreach($users as $user)
    <tr>
       <td>{{$loop->index+1 }}</td>
       <td>{{$user->name}}</td>
       <td>{{$user->email }}</td>
      </tr>
      @endforeach
   </tbody>
</table>
@endsection

