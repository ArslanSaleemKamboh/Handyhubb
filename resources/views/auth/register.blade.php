@extends('layouts.auth')
@section('title')
Register
@endsection
@section('content')
<div class="container center">
<div class="m-auto logo-width mb-3">
    <div class="auth-logo">
        <a href="{{route('main')}}">
<img src="{{asset('public/frontend/images/logo.svg')}}" alt="">
</a>
</div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="auth-card-width">
            <!-- <h1 class="text-center">{{ __('Register') }}</h1> -->
            <div class="auth-form">
        <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="col-md-12 col-form-label text-right">{{ __('Name') }}</label>
                                
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Name*" value="{{ old('name') }}" autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-12 col-form-label text-md-right">{{ __('Email Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address*" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="phone" class="col-md-12 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-12">
                            <input id="phone" class="form-control w-100 @error('phone') is-invalid @enderror" value="{{ old('phone') }}"  name="" type="tel">
                            @error('phone')
                                <span class="text-danger small" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <div id="pherrormsgdv" class="invalid-feedback" role="alert" style="display: none ;">
                                    <strong id="pherrormsg"></strong>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-12 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12 input-group" id="show_hide_password">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password*" name="password" autocomplete="password">
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
                            <label for="password-confirm" class="col-md-12 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password*" autocomplete="password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark px-5 rounded-pill">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
