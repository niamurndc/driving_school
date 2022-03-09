@extends('layouts.home')

@section('title')
    <title>{{$title}}</title>
@endsection


@section('content')


<section id="about" class="py-5">
    <div class="container py-4">
        <h2>{{$title}}</h2>
        {!! $page !!}
    </div>
</section>

<section id="useful-link" class="py-5 bg-deep">
    <div class="container">
        <h2 class="text-white text-center mb-4">Useful Links</h2>
        <div class="row">
            @foreach(App\Models\UsefulLink::all() as $link)
            <div class="col-md-4">
                <a href="{{$link->link}}" target="blank" class="text-white useful-link">{{$link->text}}</a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
