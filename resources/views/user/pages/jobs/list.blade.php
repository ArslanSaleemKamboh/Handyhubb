@extends('user.layouts.default')
@section('content')
 
	<div class="dashboard-headline">
		<h3>Manage Jobs</h3>

		<!-- Breadcrumbs -->
		<nav id="breadcrumbs" class="dark">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Dashboard</a></li>
				<li>Manage Jobs</li>
			</ul>
		</nav>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="dashboard-box margin-top-0">

				<!-- Headline -->
				<div class="headline">
					<h3><i class="icon-material-outline-business-center"></i> My Job Listings</h3>
				</div>

				<div class="content margin-botton-3">
					<ul class="dashboard-box-list">
						@foreach ($data as $val)
						<li>
							
							<div class="job-listing">
								<div class="job-listing-details">
									<div class="job-listing-description">
										<h3 class="job-listing-title"><a href="#">{{$val['title']}}</a> <span class="dashboard-status-button {{($val['status'] ==1?'green':'red')}}">{{($val['status'] ==1?'Active':'In-Active')}}</span></h3>

										
										<div class="job-listing-footer">
											<ul>
												<li>
												<h4>Description:</h4>
												<p>{{($val['description'])? $val['description']:'N/A'}}</p>	
												</li> 
										 </ul>
											<ul> 
												<li><i class="icon-material-outline-date-range"></i> Posted on {{date("F j, Y", strtotime($val['created_at']))}}</li> 
											</ul>
										</div>
									</div>
								</div>
							</div>

							<!-- Buttons -->
							<div class="buttons-to-right always-visible">
								<a href="" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Candidates <span class="button-info">0</span></a>
								<a href="{{route('user.add-Job', $val['id'])}}" class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-feather-edit"></i></a>
								<a href="javascript:void(0)" data-id="{{$val['id']}}" class="button gray ripple-effect ico remove_job" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2"></i></a>
							</div>
						</li>
@endforeach

					</ul>
				</div>
			</div>
		</div>
 
<!-- endpage -->
@section('page-script')
 <script>
	 $(document).on('click', '.remove_job', function(){
	var id = $(this).attr('data-id');
	if(confirm('Are you sure to delete?')){
		window.location.href  = "{{route('user.delete-job')}}"+'/'+id;
	}
 });
 </script>
@endsection
@endsection
