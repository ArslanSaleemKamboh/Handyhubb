@extends('backend.layouts.default')
@section('content')
<div id="content" class="content">
  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
				<li class="breadcrumb-item active">Users</li>
			</ol>
			<!-- end breadcrumb -->
      <!-- begin page-header -->
			<h1 class="page-header">Users</h1>
			<!-- end page-header -->
      <div class="panel panel-inverse">
      	<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">All Users</h4>
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
  <a type="button" href="{{route('users.create')}}" class="btn btn-primary">
    <i class="fa fa-plus-circle mr-1"></i> Add User
  </a>
</div>
<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle dataTable no-footer dtr-inline" role="grid" aria-describedby="data-table-default_info" style="width:100%   ">
      <thead>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Created At</th>
        <th>Options</th>
      </thead>
      <tbody>
        @if($users)
        @foreach($users as $user)
        <tr>
          <td>{{$user->id}}</td>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>
          @livewire('toggle-switch', ['model'=>$user, 'field'=>'status'], key("{{$user->id}}"))
          </td>
          <td>{{$user->created_at}}</td>
          <td class="text-center">
          <form method="post" action="{{route('users.destroy',$user)}}">
          @method('DELETE')
          @csrf
          <button type="submit" onclick="return confirm('Are you sure you want to delete this User?');"  class="btn btn-danger btn-sm">
          <i class="fa fa-trash text-white"></i> Delete
          </button>
          <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary btn-sm">
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