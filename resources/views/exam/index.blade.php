@extends('layouts.home')

@section('title')
    <title>{{$exam->title}}</title>
@endsection


@section('content')



<section id="about" class="py-5">
    <div class="container py-4">
        <div class="card p-4">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="text-deep mb-4">{{$exam->title}}</h2>
                    <p>{{$exam->desc}}</p>
                </div>
                <div class="col-md-3">
                    <h3 class="text-success">সময়: <span id="timec">{{$exam->time}}</span> Minute</h3>   
                    <h4>পূর্ণমান: {{$exam->total}} | পাস্ নম্বর: {{$exam->pass}}</h4>
 
                </div>
            </div>
            
        </div>
        
        <div class="card p-4">
            <?php $i = 1; ?>
            <form action="/exam/{{$exam->id}}" method="post" id="exam-form"> @csrf 
            @foreach($exam->questions as $question)
                <p><b>{{$i}}.</b> {{$question->text}}</p>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="option{{$i}}" id="{{$question->id}}" value="1">
                    <label class="form-check-label" for="{{$question->id}}">
                        A: {{$question->option1}}
                    </label>
                <div class="form-check">
                </div>
                    <input class="form-check-input" type="radio" name="option{{$i}}" id="{{$question->id}}" value="2">
                    <label class="form-check-label" for="{{$question->id}}">
                        B: {{$question->option2}}
                    </label>
                <div class="form-check">
                </div>
                    <input class="form-check-input" type="radio" name="option{{$i}}" id="{{$question->id}}" value="3">
                    <label class="form-check-label" for="{{$question->id}}">
                        C: {{$question->option3}}
                    </label>
                <div class="form-check">
                </div>
                    <input class="form-check-input" type="radio" name="option{{$i}}" id="{{$question->id}}" value="4">
                    <label class="form-check-label" for="{{$question->id}}">
                        D: {{$question->option4}}
                    </label>
                </div>
                <hr>
                <?php $i++; ?>

            @endforeach

            <button type="submit" class="btn btn-info">সাবমিট</button>
            </form>
        </div>
        
    </div>

    
</section>

@include('partials.useful-link')

@endsection


@section('script')
<script>
    let timeText = document.getElementById('timec');

    const getTime = timeText.innerText;
    let time = getTime * 60;

    setInterval(function(){
        time--;

        let minute = Math.floor(time / 60);
        let second = time % 60;
        console.log(minute + ':' + second);
        timeText.innerHTML = minute + ':' + second;

        if(time == 0){
            document.getElementById('exam-form').submit();
        }
    }, 1000);
    
    const sum = 1.88 - .01;
    console.log(sum);
</script>
@endsection
