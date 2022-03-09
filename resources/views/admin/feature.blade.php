@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Feature Setting</h2>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-4">
        <h6 class="mb-3">Setup Feature Content</h6>
        <form action="/admin/feature/edit" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-12 mb-4">
              <label for="about_desc">About Text in Home Page</label>
              <textarea row="5" name="about_desc" id="about_desc" class="form-control @error('about_desc') is-invalid @enderror" required>{{$feature->about_desc}}</textarea>
              @error('about_desc')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <img src="/uploads/feature/{{$feature->about_image}}" height="100px" width="180px" class="col-md-4">

            <div class="form-group col-md-12 mb-4">
              <label for="about_img">About Section Image in Home Page</label>
              <input type="file" name="about_img" id="about_img" class="form-control @error('about_img') is-invalid @enderror">
              @error('about_img')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="msg_desc">Message Text in Home Page</label>
              <textarea row="5" name="msg_desc" id="msg_desc" class="form-control @error('msg_desc') is-invalid @enderror" required>{{$feature->msg_desc}}</textarea>
              @error('msg_desc')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            

            <img src="/uploads/feature/{{$feature->msg_image}}" height="100px" width="180px" class="col-md-4">

            <div class="form-group col-md-12 mb-4">
              <label for="msg_img">Message Section Image in Home Page</label>
              <input type="file" name="msg_img" id="msg_img" class="form-control @error('msg_img') is-invalid @enderror">
              @error('msg_img')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Update</button>
            </div>
          </div>
        </form>
      </div> 

    </div>
  </div>
</div>

@endsection