@extends('layouts.home')

@section('title')
    <title>Home </title>
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    @foreach(App\Models\Content::all() as $content)
                    <p>title: {{$content->title}}</p>
                    <div>{!! $content->desc !!}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
