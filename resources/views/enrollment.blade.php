@extends('layouts.home')

@section('title')
    <title>কোর্সে ভর্তি | {{$course->title}}</title>
@endsection


@section('content')
<div class="container py-5">
    <div class="card">
        <div class="row p-2">
            <div class="col-md-9 py-4">
                <h3><b>{{$course->title}}</b></h3>
                <h5 class="mt-4"><i class="fa fa-user-o"></i> {{count($course->students)}} Students</h5>
                <h2 class="mt-2 text-dark"><b>৳ {{$course->price}} </b></h2>
            </div>
            <div class="col-md-3">
                    <img src="/uploads/course/{{$course->image}}" alt="course-image" width="100%" height="
                210px">
            </div>
        </div>
    </div>
    

    <div class="card mt-4 p-4">
        <h4 class="text-deep">কোর্সে ভর্তির জন্য ফরমটি পূরণ করুন</h4>
        <form action="/enrollment/{{$course->id}}" method="post"> @csrf
            <div class="col-md-6">
                <div class="form-group mb-4">
                    <label for="name">নাম</label>
                    <input type="text" name="name" id="name" class="form-control" readonly value="{{auth()->user()->name}}">
                </div>
                <div class="form-group mb-4">
                    <label for="phone">ফোন</label>
                    <input type="text" name="phone" id="phone" class="form-control" readonly value="{{auth()->user()->phone}}">
                </div>

                <div class="form-group mb-4">
                    <label for="amount">টাকার পরিমান</label>
                    <input type="number" name="amount" id="amount" class="form-control" readonly value="{{$course->price}}">
                </div>

                <p><b>নিচের যে কোনো একটি নম্বর টাকা পাঠান</b></p>
                <p>বিকাশ পার্সোনাল: ০২৬৫৪৭৮৯৩১</p>
                <p>নাগদ পার্সোনাল: ০২৬৫৪৭৮৯৩১</p>
                <p>রকেট পার্সোনাল: ০২৬৫৪৭৮৯৩১</p>
                <div class="form-group mb-4">
                    <label for="method">যে নম্বর এ টাকা দিয়েছেন</label>
                    <select name="method" id="method" class="form-control @error('method') is-invalid @enderror">
                        <option value="">Select</option>
                        <option value="bkash">Bkash</option>
                        <option value="nagad">Nagad</option>
                        <option value="Rocket">Rocket</option>
                    </select>
                    @error('method') 
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="phone">যে নম্বর থেকে টাকা পাঠিয়েছেন (লাস্ট ৪ নম্বর)</label>
                    <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" required id="flexCheckIndeterminate">
                    <label class="form-check-label" for="flexCheckIndeterminate">
                        আমি <a href="/terms">শর্তাবলীর</a> সাথে একমত
                    </label>
                </div>

                <button type="submit" class="btn btn-info">কন্ফার্ম</button>
            </div>
        </form>
    </div>
</div>






@include('partials.useful-link')

@endsection
