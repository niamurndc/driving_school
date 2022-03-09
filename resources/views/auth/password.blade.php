@extends('layouts.home')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">

                <h2>নতুন পাসওয়ার্ড</h2>

                <form method="POST" action="{{ route('reset.pass') }}">
                    @csrf

                    <div class="mt-5 mb-4">
                        <label for="code">কোড</label>

                        
                            <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>

                            @error('code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password">পাসওয়ার্ড</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password-confirm">কনফার্ম পাসওয়ার্ড</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">পরবর্তী</button>
                        
                        <br>

                        <a class="btn btn-link mt-4" href="{{ route('login') }}">
                        লগইন এ ফিরে যান
                        </a>
                    </div>
                </form>
                    
            </div>
        </div>
    </div>
</div>
@endsection
