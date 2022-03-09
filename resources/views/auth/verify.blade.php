@extends('layouts.home')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">

                <h2>ফোন ভেরিফিকেশন</h2>

                <form method="POST" action="{{ route('verify') }}">
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


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">পরবর্তী</button>

                    </div>
                </form>
                    
            </div>
        </div>
    </div>
</div>
@endsection
