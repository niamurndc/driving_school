@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Courses</h2>
    <a href="/admin/courses" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
        @include('partials.course-nav')
        <div class="card p-4">
            <h4>Edit Content</h4>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="/admin/content/edit/{{$content->id}}" method="post" enctype="multipart/form-data"> @csrf 
                        <div class="form-group">
                            <label for="title">Content Title *</label>
                            <input type="text" name="title" id="title" class="form-control mb-4 @error('title') is-invalid @enderror" value="{{$content->title}}" required>
                            @error('title')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <img src="/uploads/content/{{$content->image}}" height="100px" width="150px">

                        <div class="form-group">
                            <label for="image">Image (less then 5 mb)</label>
                            <input type="file" name="image" id="image" class="form-control mb-4 @error('image') is-invalid @enderror">
                            @error('image')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="type">Content Type *</label>
                            <select name="type" id="type" class="form-control mb-4 @error('image') is-invalid @enderror" required>
                                <option {{$content->type == 'article' ? 'selected' : ''}} value="article">Article</option>
                                <option {{$content->type == 'image' ? 'selected' : ''}} value="image">Image</option>
                                <option {{$content->type == 'youtube' ? 'selected' : ''}} value="youtube">You Tube Video</option>
                            </select>
                            @error('image')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="desc">Content Description</label>
                            <textarea name="desc" id="desc" rows="6" class="form-control @error('desc') is-invalid @enderror">{{$content->desc}}</textarea>
                            @error('image')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

@endsection