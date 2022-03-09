@extends('layouts.home')

@section('title')
    <title>Welcome </title>
@endsection


@section('content')



<section id="about" class="py-5">
    <div class="container py-4">
        <h2 class="text-deep mb-4">তথ্য মূলক চিহ্ন</h2>
        <div class="row">
            @foreach($icons as $icon)
            @if($icon->section == 1)
                <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-center">
                    <img src="/uploads/icon/{{$icon->image}}" alt="icon" width="100%">
                    <h6>{{$icon->title}}</h6>
                </div>
            @endif
            @endforeach
        </div>
    </div>

    <div class="container py-4">
        <h2 class="text-deep mb-4">বাধ্যতামূলক হ্যা বোধক চিহ্ন</h2>
        <div class="row">
            @foreach($icons as $icon)
            @if($icon->section == 2)
                <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-center">
                    <img src="/uploads/icon/{{$icon->image}}" alt="icon" width="100%">
                    <h6>{{$icon->title}}</h6>
                </div>
            @endif
            @endforeach
        </div>
    </div>

    <div class="container py-4">
        <h2 class="text-deep mb-4">বাধ্যতামূলক না বোধক চিহ্ন</h2>
        <div class="row">
            @foreach($icons as $icon)
            @if($icon->section == 3)
                <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-center">
                    <img src="/uploads/icon/{{$icon->image}}" alt="icon" width="100%">
                    <h6>{{$icon->title}}</h6>
                </div>
            @endif
            @endforeach
        </div>
    </div>

    <div class="container py-4">
        <h2 class="text-deep mb-4">সতর্কতামূলক চিহ্ন</h2>
        <div class="row">
            @foreach($icons as $icon)
            @if($icon->section == 4)
                <div class="col-4 col-sm-3 col-md-2 col-lg-1 text-center">
                    <img src="/uploads/icon/{{$icon->image}}" alt="icon" width="100%">
                    <h6>{{$icon->title}}</h6>
                </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

@include('partials.useful-link')

@endsection
