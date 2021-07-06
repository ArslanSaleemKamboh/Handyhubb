@extends('backend.layouts.default')
@section('content')
<div id="content" class="content">
  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
				<li class="breadcrumb-item active">Categories</li>
			</ol>
			<!-- end breadcrumb -->
      <!-- begin page-header -->
			<h1 class="page-header">Categories</h1>
			<!-- end page-header -->
      <div class="panel panel-inverse">
      	<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Edit Category</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
					</div>
				</div>
				<!-- end panel-heading -->
        	<!-- begin panel-body -->
          <div class="panel-body">
          <div class="card-body">
          <form method="post" action="{{route('users.update',$user)}}">
          @csrf
          <input type="hidden" name="_method" value="PUT"> 
          <div class="form-group">
              <label for="exampleInputEmail1">Name </label>
              <input type="text" name="name" value="{{$user->name}}"  class="form-control @error('name')is-invalid @enderror"  placeholder="Enter Name">
              @error('name')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Email</label>
              <input type="text" class="form-control @error('email')is-invalid @enderror" name="email" value="{{$user->email}}" placeholder="Enter Email" >
              @error('email')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Phone</label>
              <input type="text" class="form-control @error('email')is-invalid @enderror" value="{{$user->phone}}" name="phone" placeholder="Enter Phone" >
              @error('phone')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control @error('password')is-invalid @enderror" name="password" placeholder="Password" >
              @error('password')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm</label>
              <input type="password" class="form-control" name="password_confirmation" placeholder="Password" >
            </div>
            <div class="d-flex justify-content-end mb-2">
  <a href="{{url()->previous()}}" class="btn btn-light mr-2">
    <i class="fa fa-arrow-circle-left mr-1"></i> Back
  </a>
  <button type="submit" class="btn btn-primary">
    <i class="fa fa-plus-circle mr-1"></i> Save
  </button>
</div>
            </form>
          </div>
          </div>
        	<!-- end panel-body -->
</div>
</div>
@stop