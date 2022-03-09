@extends('layouts.admin')

@section('content')
<div class="card border-light bg-light px-3 mb-4">
  <div class="d-flex justify-content-between align-items-center">
    <h2>{{$exam->title}}</h2>
    <a href="/admin/courses" class="btn btn-primary">Back</a>
  </div>
  
</div>

<div class="container">
  <div class="row justify-content-center">

    <div class="col-md-8">
      <div class="card mb-4 p-3">
        <p>{{$exam->desc}}</p>
      </div>
      <div class="card px-3 py-3 mb-5">
        <h6 class="mb-3">Add Question</h6>
        <form action="/admin/exam-question/add/{{$exam->id}}" method="post" enctype="multipart/form-data">
          @csrf 
          <div class="row">
            <div class="form-group col-md-8 mb-4">
                <label for="text">Question Text</label>
                <input type="text" name="text" id="text" class="form-control @error('text') is-invalid @enderror" value="{{old('text')}}" required>
                @error('text')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="form-group col-md-4 mb-4">
                <label for="desc">Answer (correct option)</label>
                <select name="ans" id="ans" class="form-control" required>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    <option value="4">Option 4</option>
                </select>
            </div>


            <div class="form-group col-md-6 mb-4">
                <label for="option1">Option 1</label>
                <input type="text" name="option1" id="option1" class="form-control @error('option1') is-invalid @enderror" value="{{old('option1')}}" required>
                @error('option1')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="option2">Option 2</label>
                <input type="text" name="option2" id="option2" class="form-control @error('option2') is-invalid @enderror" value="{{old('option2')}}" required>
                @error('option2')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="option3">Option 3</label>
                <input type="text" name="option3" id="option3" class="form-control @error('option3') is-invalid @enderror" value="{{old('option3')}}" required>
                @error('option3')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="form-group col-md-6 mb-4">
                <label for="option4">Option 4</label>
                <input type="text" name="option4" id="option4" class="form-control @error('option4') is-invalid @enderror" value="{{old('option4')}}" required>
                @error('option4')
                <div class="invalid-feedback">
                    <p>{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="col-md-6 text-left">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
          </div>
        </form>
      </div>

      <div class="card mb-4 p-3">
          <?php $i = 1; ?>
            @foreach($exam->questions as $question)
                <p><b>{{$i}}</b> {{$question->text}} <b>Correct ans: {{$question->ans}}</b> <a href="/admin/exam-question/delete/{{$question->id}}" class="btn btn-danger btn-sm">Delete</a></p> 
                <div class="row">
                    <div class="col-md-6">
                        <p>A: {{$question->option1}}</p>
                    </div>
                    <div class="col-md-6">
                        <p>B: {{$question->option2}}</p>
                    </div>
                    <div class="col-md-6">
                        <p>C: {{$question->option3}}</p>
                    </div>
                    <div class="col-md-6">
                        <p>D: {{$question->option4}}</p>
                    </div>
                </div>
                <hr>
                <?php $i++; ?>
            @endforeach
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