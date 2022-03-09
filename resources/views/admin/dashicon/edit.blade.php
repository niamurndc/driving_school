@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Dshboard Sign</h2>
    <a href="/admin/dashicons" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Edit Sign</h6>
        <div class="d-flex justify-content-end">
          <img src="/uploads/dashicon/{{$dashicon->image}}" alt="category image" height="50px" width="50px">
        </div>
        <form action="/admin/dashicon/edit/{{$dashicon->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$dashicon->title}}" class="form-control @error('title') is-invalid @enderror">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            

            <div class="form-group col-md-4">
              <label for="image">Image</label>
              <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
              @error('image')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-4">
              <label for="desc">Description</label>
              <textarea name="desc" id="desc" rows="5" class="form-control">{{$dashicon->desc}}</textarea>
              @error('desc')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>
            <div class="col-md-4 text-left">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
          </div>
        </form>
      </div>

      </div>
  </div>
</div>

@endsection