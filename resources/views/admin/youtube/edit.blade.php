@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Youtube Videos</h2>
    <a href="/admin/youtubes" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Edit Youtube Video</h6>

        <form action="/admin/youtube/edit/{{$youtube->id}}" method="post">
          @csrf 
          <div class="row">
          <div class="form-group col-md-12 mb-4">
              <label for="title">Title</label>
              <input type="title" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required value="{{$youtube->title}}">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="desc">Vdieo Code</label>
              <textarea rows="5" name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" required>{{$youtube->desc}}</textarea>
              @error('desc')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            
            <div class="col-md-4 text-left">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
        </form>
      </div>

      </div>
  </div>
</div>

@endsection