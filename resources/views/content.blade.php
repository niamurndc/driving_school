@extends('layouts.home')

@section('title')
    <title>কনটেন্ট | {{$course->title}}</title>
@endsection


@section('content')
<div class="bg-black text-white">
    <div class="container py-3 py-md-4 content">
        @if($content->type == 'image')
        <img src="/uploads/content/{{$content->image}}" alt="content image" width="100%">
        @elseif($content->type == 'youtube')
        
        {!! $content->desc !!}
        @else
        <div class="card p-4 text-black">
            {!! $content->desc !!}
        </div>
        @endif
    </div>
</div>


<div class="container py-4">
    <div class="row p-1">
        <div class="col-md-8">

            <div class="card p-4 mb-4">
                <h3 class="text-deep mb-4">কোর্স এর কনটেন্ট</h3>
                <ul class="list-group">
                    @foreach($course->contents as $content)
                        <li class="list-group-item">
                            @if($content->type == 'article')
                            <i class="fa fa-file-text-o me-3"></i>
                            @elseif($content->type == 'youtube')
                            <i class="fa fa-youtube me-3"></i>
                            @else
                            <i class="fa fa-file-image-o me-3"></i>
                            @endif
                            <a class="text-dark" href="/course/{{$course->slug}}/content/{{$content->id}}">{{$content->title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="col-md-4">

            <div class="card p-4 mb-4">
                <h3 class="text-deep mb-4">কোর্স এর পরীক্ষা সমূহ</h3>
                    @foreach(App\Models\Exam::all() as $exam)
                        <p><i class="fa fa-sticky-note-o"></i> <b> <a href="/exam/{{$exam->id}}" class="text-black">{{$exam->title}}</a></b></p>
                    @endforeach
            </div>
        </div>
    </div>
</div>


@include('partials.useful-link')

@endsection
