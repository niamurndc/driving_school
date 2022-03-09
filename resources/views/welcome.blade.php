@extends('layouts.home')

@section('title')
    <title>Welcome </title>
@endsection


@section('content')

@include('partials.front-slider')

<?php $feature = App\Models\Feature::find(1); ?>
<section id="about" class="py-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0 p-md-5">
                <h2 class="text-deep mb-4">প্রতিষ্ঠান সম্পর্কে</h2>
                <div>
                {!! $feature->about_desc !!}
                </div>
                

            </div>
            <div class="col-md-6 text-end d-flex justify-content-end align-items-center p-md-5">
                <img src="/uploads/feature/{{$feature->about_image}}" alt="image" width="100%">
            </div>
        </div>
    </div>
</section>

<section id="message" class="py-5">
    <div class="container py-4">
        <div class="row">
            <div class="col-md-6 text-end d-flex justify-content-center justify-content-md-start align-items-center mb-5 mb-md-0 p-md-5">
                <img src="/uploads/feature/{{$feature->msg_image}}" alt="image" width="100%">
            </div>
            <div class="col-md-6 p-md-5">
                <h2 class="text-deep mb-4">মাসুক আহমেদ</h2>
                <div>
                    {!! $feature->msg_desc !!}
                </div>
                
            </div>
            
        </div>
    </div>
</section>

@include('partials.useful-link')

@endsection
