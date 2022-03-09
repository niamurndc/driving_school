@extends('layouts.home')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">

                <h2>পাসওয়ার্ড পুনরুদ্ধার</h2>

                <form method="POST" action="{{ route('forgot.post') }}">
                    @csrf

                    <div class="mt-5 mb-4">
                        <label for="phone">ফোন</label>

                        
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
