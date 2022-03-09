@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Road Sign</h2>
    <a href="/admin/icons" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Edit Sign</h6>
        <div class="d-flex justify-content-end">
          <img src="/uploads/icon/{{$icon->image}}" alt="category image" height="50px" width="50px">
        </div>
        <form action="/admin/icon/edit/{{$icon->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-4">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" value="{{$icon->title}}" class="form-control @error('title') is-invalid @enderror">
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
              <label for="section">Road Sign Section</label>
              <select name="section" id="section" class="form-control @error('image') is-invalid @enderror" required>
                <option {{$icon->section == 1 ? 'selected' : ''}} value="1">Section 1</option>
                <option {{$icon->section == 2 ? 'selected' : ''}} value="2">Section 2</option>
                <option {{$icon->section == 3 ? 'selected' : ''}} value="3">Section 3</option>
                <option {{$icon->section == 4 ? 'selected' : ''}} value="4">Section 4</option>
              </select>
              @error('section')
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