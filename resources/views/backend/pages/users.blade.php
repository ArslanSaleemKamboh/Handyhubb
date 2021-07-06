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

            @livewire('users.show')
          </div>
        	<!-- end panel-body -->
</div>
</div>
@stop