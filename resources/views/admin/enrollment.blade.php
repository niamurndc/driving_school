@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Enrollments</h2>
  </div>
  
</div>

<div class="container">

  <div class="card px-3 py-3 mt-5">
    <h6 class="mb-3">All Enrollment Student</h6>
    <table class="table table-striped" id="example">
      <thead>
        <tr>
          <th scope="col">Course Title</th>
          <th scope="col">Student Name</th>
          <th scope="col">Amount</th>
          <th scope="col">Payment Method</th>
          <th scope="col">Last Number</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($enrollments as $enroll)
        <tr>
          <td>{{$enroll->course == null ? 'Course deleted' : $enroll->course->title}}</td>
          <td>{{$enroll->student == null ? 'Unknown' : $enroll->student->name}}</td>
          <td>{{$enroll->amount}}</td>
          <td>{{$enroll->method}}</td>
          <td>{{$enroll->phone}}</td>
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
@endsection