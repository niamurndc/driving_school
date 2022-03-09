@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Youtube Videos</h2>
    <a href="/admin/youtube/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mt-5">
        <h6 class="mb-3">All Youtube Videos</h6>
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th scope="col">Video</th>
              <th scope="col">Title</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($youtubes as $youtube)
            <tr>
              <td class="youtube-admin">{!!$youtube->desc!!}</td>
              <td>{{$youtube->title}}</td>
              <td>
                <a href="/admin/youtube/edit/{{$youtube->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="/admin/youtube/delete/{{$youtube->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
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