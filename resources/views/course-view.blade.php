@extends('layouts.home')

@section('title')
    <title>{{$course->title}}</title>
@endsection


@section('content')
<div class="bg-black text-white">
    <div class="container py-5">
        <div class="row p-1">
            <div class="col-md-8 py-4">
                <h1><b>{{$course->title}}</b></h1>
                <h5 class="mt-5"><i class="fa fa-user-o"></i> {{count($course->students)}} Students</h5>
                <h5><i class="fa fa-clock-o"></i> Uploaded: {{$course->updated_at}}</h5>


                @if(count(App\Models\Enrollment::where('student_id', auth()->user()->id)->where('course_id', $course->id)->get()) == 0)
                <a href="/enrollment/{{$course->id}}" class="btn btn-lg btn-info text-black mt-5"><i class="fa fa-shopping-cart"></i> এই কোর্স এ ভর্তি হোন</a>

                @endif
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="/uploads/course/{{$course->image}}" alt="course-image" width="100%" height="
                240px">

                <h1 class="mt-4 text-dark"><b>৳ {{$course->price}} </b><strike>{{$course->cprice}}</strike></h1>
                </div>

            </div>
        </div>
    </div>
</div>


<div class="container py-4">
    <div class="row p-1">
        <div class="col-md-8">
            <div class="card p-4 mb-4">
                <h3 class="text-deep mb-4">এই কোর্স এ যা রয়েছে</h3>
                <div class="row">
                    @foreach(json_decode($course->feature) as $feature)
                    <div class="col-md-6">
                        <p><i class="fa fa-check-circle"></i> {{$feature}}</p>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="card p-4 mb-4">
                <h3 class="text-deep mb-4">কোর্স এর বিস্তারিত</h3>
                {!!$course->desc!!}
            </div>

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
                <h3 class="text-deep mb-4">ফিচার সমূহ</h3>
                @foreach(json_decode($course->material) as $material)
                <p><i class="fa fa-check"></i> <b> {{$material}}</b></p>
                @endforeach
            </div>

            <div class="card p-4 mb-4">
                <h3 class="text-deep mb-4">পরীক্ষা সমূহ</h3>
                @if(count(App\Models\Enrollment::where('student_id', auth()->user()->id)->where('course_id', $course->id)->where('status', 1)->get()) != 0)
                    @foreach(App\Models\Exam::all() as $exam)
                        <p><i class="fa fa-sticky-note-o"></i> <b> <a href="/exam/{{$exam->id}}" class="text-black">{{$exam->title}}</a></b></p>
                    @endforeach
                @else
                <p>অনুমোদন এর জন্য অপেক্ষা করুন</p>
                @endif
            </div>
        </div>
    </div>
</div>


@include('partials.useful-link')

@endsection
