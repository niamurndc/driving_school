@extends('layouts.home')

@section('title')
    <title>প্রোফাইল</title>
@endsection


@section('content')



<section id="about" class="py-5">
    <div class="container py-4">
    <h2 class="text-deep text-center mb-5">প্রোফাইল আপডেট</h2>
    <div class="card p-4">
        <form action="/profile" method="post" enctype="multipart/form-data"> @csrf
            <div class="row">
                <div class="col-md-6">
                    <img src="/uploads/profile/{{auth()->user()->image}}" alt="প্রোফাইল ইমেজ" class="profile-image mb-2">
                    <h6>{{auth()->user()->name}}</h6>
                    <p>ফোন: {{auth()->user()->phone}}</p>
                </div>
                <div class="col-md-6 form-group mb-4">
                    <label for="name">নাম</label>
                    <input type="text" name="name" id="name" value="{{auth()->user()->name}}" class="form-control @error('name') is-invalid @enderror" required>
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                
                <div class="col-md-6 form-group mb-4">
                    <label for="image">প্রোফাইল ইমেজ</label>
                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                    @error('image')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6 form-group mb-4">
                    <label for="password">পাসওয়ার্ড</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-info text-dark">আপডেট</button>
                </div>
                
            </div>
        </form>
    </div>
    
    </div>
</section>


@endsection
