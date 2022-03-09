@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Useful Link</h2>
    <a href="/admin/links" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3">
        <h6 class="mb-3">Edit Useful Link</h6>

        <form action="/admin/link/edit/{{$link->id}}" method="post">
          @csrf 
          <div class="row">
          <div class="form-group col-md-12 mb-4">
              <label for="text">Text</label>
              <input type="text" name="text" id="text" class="form-control @error('text') is-invalid @enderror" required value="{{$link->text}}">
              @error('text')
              <div class="invalid-feedback">
                <p>{{ $message }}</p>
              </div>
              @enderror
            </div>

            <div class="form-group col-md-12 mb-4">
              <label for="link">Link</label>
              <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" required value="{{$link->link}}">
              @error('link')
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