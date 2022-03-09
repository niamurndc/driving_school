@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Dashboard Sign</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    
      <div class="card px-3 py-3">
        <h6 class="mb-3">Add New Dashboard</h6>
        <form action="/admin/dashicon/create" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror" required>
              @error('image')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="desc">Description</label>
              <textarea name="desc" id="desc" rows="3" class="form-control"></textarea>
              @error('desc')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="col-md-4 text-left">
              <button type="submit" class="btn btn-primary mt-4">Add New</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card px-3 py-3 mt-5">
        <h6 class="mb-3">All Road Sign</h6>
        <table class="table table-striped" id="example">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Section</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($dashicons as $icon)
            <tr>
              <td><img src="/uploads/dashicon/{{$icon->image}}" alt="cat image" height="30px" width="30px"></td>
              <td>{{$icon->title}}</td>
              <td>{{$icon->desc}}</td>
              <td>
                <a href="/admin/dashicon/edit/{{$icon->id}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                <a href="/admin/dashicon/delete/{{$icon->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash" onClick="return confirm('Are you want to delete?')"></i></a>
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