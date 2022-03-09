@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Notice</h2>
    <a href="/admin/notices" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Edit Notice</h6>

        <form action="/admin/notice/edit/{{$notice->id}}" method="post">
          @csrf 
          <div class="row">
            <div class="form-group col-md-12 mb-4">
              <label for="title">Title</label>
              <input type="title" name="title" id="title" class="form-control @error('title') is-invalid @enderror" required value="{{$notice->title}}">
              @error('title')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="desc">Description</label>
              <textarea name="desc" rows="4" id="desc" class="form-control @error('desc') is-invalid @enderror" required>{{$notice->desc}}</textarea>
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