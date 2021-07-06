@extends('backend.layouts.simple')
@section('content')
<body class="pace-top">
<div id="page-container" >
<div class="login login-v1">

<div class="login-container">

<div class="login-header">
<div class="brand">
<span class="logo"></span> <b>Color</b> Admin
<small>responsive bootstrap 4 admin template</small>
</div>
<div class="icon">
<i class="fa fa-lock"></i>
</div>
</div>
<div class="login-body">

<div class="login-content">
@if($errors->has('authentication_failed'))
      <div class="alert alert-danger" role="alert">
  {{$errors->first('authentication_failed')}}
</div>
@endif
<form action="{{route('admin.login')}}" method="post">
          @csrf
        <div class="input-group m-b-20">
          <input type="email" class="form-control form-control-lg inverse-mode" name="email" value="{{old('email')}}" placeholder="Email">
        </div>
        @error('email')<p class="text-danger">{{$message}}</p>@enderror
        <div class="input-group m-b-20">
          <input type="password" class="form-control form-control-lg inverse-mode" name="password" placeholder="Password">
        </div>
        @error('password')<p class="text-danger">{{$message}}</p>@enderror
        <div class="login-buttons">
<button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
</div>
      </form>
</div>

</div>

</div>

</div>
</div>
@stop