@extends('layouts.home')

@section('title')
    <title>নোটিশ</title>
@endsection


@section('content')



<section id="about" class="py-5">
    <div class="container py-4">
        <h2 class="text-deep mb-4">নোটিশ</h2>
        @foreach($notices as $notice)
        <div class="card p-4 mb-4">
            <h4 class="text-center">{{$notice->title}}</h4>
            <div class="border-top pt-4">
                {{$notice->desc}}
            </div>
        </div>

        @endforeach
    </div>

    
</section>

@include('partials.useful-link')

@endsection
