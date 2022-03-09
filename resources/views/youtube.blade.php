@extends('layouts.home')

@section('title')
    <title>Youtube Videos</title>
@endsection


@section('content')



<section id="about" class="py-5">
    <div class="container bg-light py-4">
        <h2 class="text-deep mb-4">Youtube Videos</h2>
        <div class="row">
        @foreach($videos as $notice)
            <div class="col-md-4">
                <div class="card youtube">
                    {!!$notice->desc!!}
                </div>
            </div>
        @endforeach
        </div>

        
    </div>

    
</section>

@include('partials.useful-link')

@endsection
