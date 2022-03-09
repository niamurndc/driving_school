@extends('layouts.home')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">

                <h2>লগইন</h2>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class=" mb-4">
                            <label for="phone">ফোন</label>

                            
                                <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class=" mb-4">
                            <label for="password">পাসওয়ার্ড</label>

                            
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>



                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">লগইন</button>
                            
                            <br>

                            <a class="btn btn-link mt-4" href="{{ route('forgot') }}">
                            পাসওয়ার্ড ভুলে গেছেন ?
                            </a>
                        </div>
                    </form>
                    
            </div>
        </div>
    </div>
</div>
@endsection
