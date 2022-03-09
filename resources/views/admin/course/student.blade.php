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
                    <th scope="col">Student Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Marks</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course->students as $enroll)
                    <tr>
                    <td>{{$enroll->student == null ? 'Unknown' : $enroll->student->name}}</td>
                    <td>{{$enroll->student == null ? 'Unknown' : $enroll->student->phone}}</td>
                    <td>{{$enroll->marks}}</td>
                    <td>
                        @if($enroll->status == 0)
                        Pending
                        @elseif($enroll->status == 1)
                        Approved
                        @elseif($enroll->status == 2)
                        Banned
                        @endif
                    </td>
                    <td>
                        @if($enroll->status == 0)
                        <a href="/admin/enrollment/edit/{{$enroll->id}}" class="btn btn-success btn-sm" onClick="return confirm('Are you want to approved?')"><i class="fa fa-check"></i></a>
                        @elseif($enroll->status == 1)
                        <a href="/admin/enrollment/edit/{{$enroll->id}}" class="btn btn-warning btn-sm"><i class="fa fa-times" onClick="return confirm('Are you want to banned?')"></i></a>
                        @elseif($enroll->status == 2)
                        <a href="/admin/enrollment/edit/{{$enroll->id}}" class="btn btn-success btn-sm"><i class="fa fa-times" onClick="return confirm('Are you want to banned?')"></i></a>
                        @endif
                        <a href="/admin/enrollment/delete/{{$enroll->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
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