@extends('layouts.auth')

@section('content')
<div class="container center">
    <div class="d-flex justify-content-center">
    <div class="w-75">
    <div class="m-auto logo-width mb-3">
    <div class="auth-logo">
<img src="{{asset('public/frontend/images/logo.svg')}}" alt="">
</div>
    </div>
    <h2 class="text-center text-gray">Forget Your Password?</h2>
    <p class="text-center text-gray">Don't worry, We got you</p>
    <p class="text-center text-gray">Enter the email associated with your account</p>

    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="col-md-12">
                                <input id="email" type="email" placeholder="Enter your email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mt-3 mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark reset-btn">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                                <a href="{{route('login')}}" class="btn btn-dark reset-btn">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
    </div>
        <!-- <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                   
                </div>
            </div>
        </div> -->
    </div>
</div>
@endsection
