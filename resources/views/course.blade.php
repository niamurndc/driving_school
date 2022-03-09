@extends('layouts.home')

@section('title')
    <title>Welcome </title>
@endsection


@section('content')
@include('partials.front-slider')

<section id="about" class="py-5">
    <div class="container py-4">
        <h2 class="text-center mb-5">আমাদের কোর্সসমূহ</h2>
        <div class="row">

        @foreach($courses as $course)
        <div class="col-md-3">
            <div class="card">
                <img src="/uploads/course/{{$course->image}}" alt="image" width="100%" height="210px">
                <div class="card-body p-2 mt-4">
                    <a href="/course/{{$course->slug}}" class="course-title mb-2">{{$course->title}}</a>

                    <p class="text-dark"><i class="fa fa-user-o me-2"></i> <b>{{count($course->students)}} </b>Students</p>
                    <div class="row pt-2 border-top">
                        <div class="col-7">
                            <h5 class="text-deep"><b>৳ {{$course->price}} </b> <strike>{{$course->cprice}}</strike></h5>
                        </div>
                        <div class="col-5 text-end">
                            <h5 class="text-deep"><a class="text-deep" href="/course/{{$course->slug}}">ভর্তি হোন</a></h5>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        @endforeach

        </div>
    </div>
</section>

@include('partials.useful-link')

@endsection
