@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Exams</h2>
    <a href="/admin/exams" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8">
                <div class="card p-4">
                <h4>Edit Exam</h4>
                    <form action="/admin/exam/edit/{{$exam->id}}" method="post" enctype="multipart/form-data"> @csrf 
                        <div class="form-group">
                            <label for="title">Exam Title *</label>
                            <input type="text" name="title" id="title" class="form-control mb-4 @error('title') is-invalid @enderror" value="{{$exam->title}}" required>
                            @error('title')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="desc">Exam Description</label>
                            <textarea name="desc" id="desc" rows="3" class="form-control mb-4 @error('desc') is-invalid @enderror">{{$exam->desc}}</textarea>
                            @error('image')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="total">Total Marks *</label>
                            <input type="number" name="total" id="total" class="form-control mb-4 @error('total') is-invalid @enderror" value="{{$exam->total}}" required>
                            @error('total')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="pass">Pass Marks *</label>
                            <input type="number" name="pass" id="pass" class="form-control mb-4 @error('pass') is-invalid @enderror" value="{{$exam->pass}}" required>
                            @error('pass')
                            <div class="invalid-feedback">
                                <p>{{ $message }}</p>
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="time">Time *</label>
                            <input type="number" name="time" id="time" class="form-control mb-4 @error('time') is-invalid @enderror" value="{{$exam->time}}" required>
                            @error('time')
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

@endsection