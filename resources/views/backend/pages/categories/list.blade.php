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
					<h4 class="panel-title">All Categories</h4>
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
          @include('backend.includes.message')
		  <div class="d-flex justify-content-end mb-2">
  <a type="button" href="{{route('categories.create')}}" class="btn btn-primary">
    <i class="fa fa-plus-circle mr-1"></i> Add Category
  </a>
</div>
<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline" role="grid" aria-describedby="data-table-default_info" style="width:100%   ">
      <thead>
        <th>ID</th>
        <th>Link</th>
        <th>Title</th>
        <th>parent</th>
        <th>SortNo</th>
        <th>Status</th>
        <th>InHeader</th>
        <th>Options</th>
      </thead>
      <tbody>
        @if($categories)
        @foreach($categories as $category)
        <tr>
          <td>{{$category->id}}</td>
          <td>{{$category->name}}</td>
          <td>{{$category->title}}</td>
          <td>
            @foreach($categories as $val)
            @if($category->parent_id==$val->id)
            {{$val->name}}
            @endif
            @endforeach
          </td>
          <td>{{$category->search_count}}</td>
          <td>
          @livewire('toggle-switch', ['model'=>$category, 'field'=>'status'], key("{{$category->id}}"))  
        </td>
          <td>{{$category->in_header}}</td>
          <td class="text-center">
          <form method="post" action="{{route('categories.destroy',$category)}}">
          @method('DELETE')
          @csrf
          <button type="submit" onclick="return confirm('Are you sure you want to delete this Category?');"  class="btn btn-danger btn-sm">
          <i class="fa fa-trash text-white"></i> Delete
          </button>
          <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary btn-sm">
          <i class="fa fa-edit text-white"></i> Edit
          </a>
          </form>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
          </div>
        	<!-- end panel-body -->
</div>
</div>
@stop