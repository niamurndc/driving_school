@extends('layouts.home')

@section('title')
    <title>Welcome </title>
@endsection


@section('content')

<section id="about" class="py-5">
    <div class="container py-4">
        <h2 class="text-center mb-5">আপনার সার্টিফিকেট</h2>

        <div class="card p-4 bg-light">
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th></th>
                        <th>Course Title</th>
                        <th>Your Marks</th>
                        <th>Certificate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrolls as $enroll)
                    @if($enroll->course_id != null)
                    <tr>
                        <td><img src="/uploads/course/{{$enroll->course->image}}" height="80px" width="120px"></td>
                        <td>{{$enroll->course->title}}</td>
                        <td>{{$enroll->marks}}</td>
                        <td>@if($enroll->certificate == 1) <a href="/get-certificate/{{$enroll->id}}" class="text-deep">ডাউনলোড</a> @else নাই @endif</td>
                    </tr>
                    @else
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection
