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
                    <h4>পূর্ণমান: {{$exam->total}} | পাস্ নম্বর: {{$exam->pass}}</h4>
                </div>
            </div>
            
        </div>

        <div class="card py-5">
            <div class="py-5 text-center">
                
                @if($marks >= $exam->pass)
                <h1 class="text-success"><i class="fa fa-check-circle"></i></h1>
                <h2 class="text-success">সফল হয়েছেন</h2>
                @else
                <h1 class="text-danger"><i class="fa fa-times-circle"></i></h1>
                <h2 class="text-danger">আবার চেষ্ঠা করুন</h2>
                @endif

                <h4>আপনার নম্বর: {{$marks}}</h4>
            </div>
        </div>
        
    </div>

    
</section>

@include('partials.useful-link')

@endsection


@section('script')

@endsection
