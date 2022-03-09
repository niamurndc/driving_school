@extends('layouts.home')

@section('title')
    <title>Welcome </title>
@endsection


@section('content')

<section id="about" class="py-5">
    <div class="container py-4">
        <h2 class="text-center mb-5">আপনার কোর্সসমূহ</h2>

        <div class="card p-4 bg-light">
            <div class="row">
                @foreach($enrolls as $enroll)
                @if($enroll->course_id != null)
                <div class="col-md-3">
                    <div class="card">
                        <img src="/uploads/course/{{$enroll->course->image}}" alt="image" width="100%" height="210px">
                        <div class="card-body p-2 mt-4">
                            <a href="/course/{{$enroll->course->slug}}" class="course-title mb-2">{{$enroll->course->title}}</a>


                            <div class="text-center pt-2 border-top">
                                    <h5 class="text-deep"><b><a class="text-deep" href="/course/{{$enroll->course->slug}}">View Course</a></b></h5>
                            </div>
                            
                        </div>
                    </div>
                </div>
                @else
                @endif
                @endforeach
            </div>
        </div>
    </div>
</section>


@endsection
