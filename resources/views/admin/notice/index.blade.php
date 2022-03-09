@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Notice</h2>
    <a href="/admin/notice/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mt-5">
        <h6 class="mb-3">All Notice</h6>
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($notices as $notice)
            <tr>
              <td>{{$notice->title}}</td>
              <td>
                <a href="/admin/notice/edit/{{$notice->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="/admin/notice/delete/{{$notice->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
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