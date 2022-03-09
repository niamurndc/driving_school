@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Courses</h2>
    <a href="/admin/courses" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        @include('partials.course-nav')
        <div class="card p-4">
            <h4>Content</h4>

            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course->contents as $content)
                    <tr>
                        <td><img src="/uploads/content/{{$content->image}}" alt="Image" height="40px" width="40px"></td>
                        <td>{{$content->title}}</td>
                        <td>{{$content->type}}</td>
                        <td>
                            <a href="/admin/content/edit/{{$content->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="/admin/content/delete/{{$content->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
</div>

@endsection