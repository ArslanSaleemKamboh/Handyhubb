@extends('layouts.app')

@section('content')
<div class="container center">
<div class="d-flex justify-content-center mb-3">
    <div class="auth-logo">
    <a href="{{route('main')}}">
<img src="{{asset('public/frontend/images/logo.png')}}">
    </a>
</div>
    </div>
<div class="d-flex justify-content-center">
        <div class="reset-card-width">
            <div class="auth-form">
           <h2 class="text-center">{{ __('Reset Password') }}</h2>
           <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" placeholder="Email Address*" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12 input-group" id="show_hide_password">
                                <input id="password" placeholder="Password*" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">
                                <div class="input-group-addon input-group-text bg-white rounded">
                                    <a href=""><i class="fa fa-eye-slash text-dark" aria-hidden="true"></i></a>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12 input-group" id="show_hide_password">
                                <input id="password" placeholder="Confirm Password*" type="password" class="form-control  @error('password') is-invalid @enderror" name="password_confirmation"  autocomplete="new-password">
                                <!-- <div class="input-group-addon input-group-text">
                                    <a href=""><i class="fa fa-eye-slash text-dark" aria-hidden="true"></i></a>
                                </div> -->

                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn rounded-pill px-5 btn-dark reset-btn">
                                    {{  __('Reset Password') }}
                                </button>
                                <a href="{{route('login')}}" class="btn rounded-pill btn-dark reset-btn">
                                    {{ __('Cancel') }}
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
        </div>
        
    </div>
  
</div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
