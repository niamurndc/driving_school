@extends('layouts.home')

@section('title')
    <title>Dashboard Icon</title>
@endsection


@section('content')



<section id="about" class="py-5">
    <div class="container py-4">
        <h2 class="text-deep mb-4">ড্যাশবোর্ড  সাইন</h2>
        <div class="row">
            @foreach($icons as $icon)
            @if($icon->section == 1)
                <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-center">
                    <img src="/uploads/dashicon/{{$icon->image}}" alt="icon" width="100%">
                    <h6>{{$icon->title}}</h6>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@include('partials.useful-link')

@endsection
