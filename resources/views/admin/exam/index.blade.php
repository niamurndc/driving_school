@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Exams</h2>
    <a href="/admin/exam/add" class="btn btn-primary">Add Exam</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card p-4">
            <h4>Exams</h4>

            <table class="table table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Total</th>
                        <th scope="col">Pass Mark</th>
                        <th scope="col">Time</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($exams as $exam)
                    <tr>
                        <td>{{$exam->title}}</td>
                        <td>{{$exam->total}}</td>
                        <td>{{$exam->pass}}</td>
                        <td>{{$exam->time}} minutes</td>
                        <td>
                            <a href="/admin/exam/view/{{$exam->id}}" class="btn btn-warning btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="/admin/exam/edit/{{$exam->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            <a href="/admin/exam/delete/{{$exam->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
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