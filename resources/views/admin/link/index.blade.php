@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Useful Links</h2>
    <a href="/admin/link/create" class="btn btn-primary">Add New</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mt-5">
        <h6 class="mb-3">All Useful Links</h6>
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th scope="col">Text</th>
              <th scope="col">Link</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($links as $link)
            <tr>
              <td>{{$link->text}}</td>
              <td><a target="blank" href="{{$link->link}}">{{$link->link}}</a></td>
              <td>
                <a href="/admin/link/edit/{{$link->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="/admin/link/delete/{{$link->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
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