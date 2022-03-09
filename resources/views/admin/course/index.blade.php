@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Courses</h2>
    <a href="/admin/course/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All Courses</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Title</th>
          <th scope="col">Slug</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($courses as $course)
        <tr>
          <td><img src="/uploads/course/{{$course->image}}" alt="Image" height="40px" width="40px"></td>
          <td>{{$course->title}}</td>
          <td>{{$course->slug}}</td>
          <td>{{$course->price}} <br> <strike>{{$course->offprice}}</strike></td>
          <td>
            <a href="/admin/course/view/{{$course->id}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
            <a href="/admin/course/edit/{{$course->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
            <a href="/admin/course/delete/{{$course->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>
@endsection