@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Courses</h2>
    <a href="/admin/courses" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">

      <div class="card px-3 py-3 mb-5">
        <h6 class="mb-3">Edit Course</h6>
        <form action="/admin/course/edit/{{$course->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-6 mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{$course->title}}">
                @error('title')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-4">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{$course->price}}">
                @error('price')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>
            <div class="form-group col-md-6 mb-4">
                <label for="cprice">Compare Price (see with <strike>cross</strike>) optional</label>
                <input type="number" name="cprice" id="cprice" class="form-control @error('cprice') is-invalid @enderror" value="{{$course->cprice}}">
                @error('cprice')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>



            <div class="form-group col-md-12 mb-4">
                <label for="desc">Description</label>
                <textarea name="desc" id="desc" rows="4" class="form-control">{{$course->desc}}</textarea>
            </div>

            

            <div class="col-md-12 mb-4">
                <h6>Material Includes</h6>
                @error('material')
                    <p class="text-danger mb-2">{{$message}}</p>
                @enderror

                <div class="row p-2" id="mat-box">
                    @foreach(json_decode($course->material) as $mat)
                        @if($loop->first)
                        <div class="form-group col-8 mb-2">
                            <input type="text" name="material[]" value="{{$mat}}" class="form-control" required>
                        </div>
                        <div class="col-2">
                            <p id="add_mat" class="btn btn-success text-light"><i class="fa fa-plus"></i></p>
                        </div>
                        <div class="col-2">
                            <p id="remove_mat" class="btn btn-danger text-light"><i class="fa fa-times"></i></p>
                        </div>
                        @else
                        <div class="form-group col-8 mb-2">
                            <input type="text" name="material[]" value="{{$mat}}" class="form-control" required>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="col-md-12 mb-4">
                <h6>Learn and Feature</h6>
                @error('feature')
                    <p class="text-danger mb-2">{{$message}}</p>
                @enderror
                <div class="row p-2" id="fet-box">
                    @foreach(json_decode($course->feature) as $fet)
                        @if($loop->first)
                        <div class="form-group col-md-8 mb-2">
                            <input type="text" name="feature[]" value="{{$fet}}" class="form-control" required>
                        </div>
                        <div class="col-md-2">
                            <p id="add_fet" class="btn btn-success text-light"><i class="fa fa-plus"></i></p>
                        </div>
                        <div class="col-2">
                            <p id="remove_fet" class="btn btn-danger text-light"><i class="fa fa-times"></i></p>
                        </div>
                        @else
                        <div class="form-group col-md-8 mb-2">
                            <input type="text" name="feature[]" value="{{$fet}}" class="form-control" required>
                        </div>
                        @endif
                    @endforeach
                    
                </div>
            </div>

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary mt-4">Create</button>
            </div>
          </div>
        </form>
      </div>

      </div>
  </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#add_mat').click(function(){
            var par = '<div class="form-group col-md-8 mb-2"><input type="text" name="material[]" class="form-control" required></div>';
            $('#mat-box').append(par);
        });

        $('#remove_mat').click(function(){
            var child = $('#mat-box').children();
            if(child.length > 3){
                $('#mat-box').children().last().remove();
            }
        });

        $('#add_fet').click(function(){
            var par2 = '<div class="form-group col-md-8 mb-2"><input type="text" name="feature[]" class="form-control" required></div>';
            $('#fet-box').append(par2);
        });

        $('#remove_fet').click(function(){
            var child = $('#fet-box').children();
            if(child.length > 3){
                $('#fet-box').children().last().remove();
            }
        })
    });
</script>
@endsection