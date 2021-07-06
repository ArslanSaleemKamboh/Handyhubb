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
          <form method="post" action="{{route('categories.update',$category)}}">
          @csrf
          <input type="hidden" name="_method" value="PUT"> 
            <div class="form-group">
              <label for="exampleInputEmail1">Link </label>
              <input type="text" name="name"  class="form-control @error('name')is-invalid @enderror" value="{{$category->name}}" placeholder="Link">
              @error('name')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Category Title</label>
              <input type="text" class="form-control @error('title')is-invalid @enderror" name="title" value="{{$category->title}}" placeholder="Category Title" >
              @error('title')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Select Category Parent</label>
              <select class="form-control" name="parent_id">
                <option value="0">Select a parent</option>
                @foreach($parentCategories as $parentCategory)
                <option {{ ( $category->parent_id == $parentCategory->id ) ? 'selected' : '' }} value="{{$parentCategory->id}}">{{$parentCategory->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>Select Category Status</label>
              <select class="form-control @error('status')is-invalid @enderror" name="status" >
              @if($category->status==1)
                <option selected value="1">Active</option>
                <option  value="0">InActive</option>
              @endif
              @if($category->status==0)
                <option value="1">Active</option>
                <option selected value="0">InActive</option>
              @endif
              </select>
              @error('status')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Select Inheader</label>
              <select class="form-control @error('inheader')is-invalid @enderror" name="inheader">
              @if($category->in_header=='yes')
                <option selected  value="yes">Yes</option>
                <option value="no">No</option>
              @endif
                @if($category->in_header=='no')
                <option value="yes">Yes</option>
                <option selected value="no">No</option>
                @endif
              </select>
              @error('status')
              <div class="invalid-feedback">
              {{$message}}
              </div>
              @enderror
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