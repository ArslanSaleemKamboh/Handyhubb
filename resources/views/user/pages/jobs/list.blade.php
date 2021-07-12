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
			@include('user.includes.message')
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
										<h3 class="job-listing-title">
											<a href="#">{{$val['title']}}</a> <span class="dashboard-status-button {{($val['status'] ==1?'green':'red')}}">{{($val['status'] ==1?'Active':'In-Active')}}</span></h3>
										
								    @if ($val->getCategory && count($val->getCategory) >0) 
										 <div class="row">
											<div class="col-md-12">
												<h3 class="job-listing-title">Categories</h3>
													@foreach ($val->getCategory as $category)
													<span class="keyword"><span class="keyword-text">{{$category->getName->name}}</span></span>
													@endforeach
											</div>
										</div>
										@endif
										
										@if ($val['tags']) 
										<div class="row">
										   <div class="col-md-12">
											   <h3 class="job-listing-title">Tags</h3>
												   @foreach (explode(',',$val['tags']) as $tag)
												   <span class="keyword"><span class="keyword-text">{{$tag}}</span></span>
												   @endforeach
										   </div>
									   </div>
									   @endif

										<div class="job-listing-footer">
											<ul>
												<li>
												<h3 class="job-listing-title">Description:</h3>
												<p>{{($val['description'])? substr($val['description'], 0, 50):'N/A'}}</p>	
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
								<a href="{{route('user.add-Job').'/'.$val['id']}}" class="button gray ripple-effect ico" data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-feather-edit"></i></a>
								<a href="javascript:void(0)" data-id="{{$val['id']}}" class="button gray ripple-effect ico remove_job" data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2"></i></a>
							</div>
						</li>
@endforeach

					</ul>
					<div class="clearfix"></div>
					<div class="pagination-container margin-top-40 margin-bottom-0">
						<nav class="pagination">
							@if ($data->lastPage() > 1)
							<ul>
								<li style="display: {{ ($data->currentPage() == 1) ? ' none' : '' }}">
									<a href="{{ $data->url(1) }}">Previous</a>
								</li>
								@for ($i = 1; $i <= $data->lastPage(); $i++)
									<li>
										<a class="{{ ($data->currentPage() == $i) ? ' current-page' : '' }}" href="{{ $data->url($i) }}">{{ $i }}</a>
									</li>
								@endfor
								<li style="display: {{ ($data->currentPage() == $data->lastPage()) ? ' none' : '' }}">
									<a href="{{ $data->url($data->currentPage()+1) }}" >Next</a>
								</li>
							</ul>
							@endif
						</nav>
					</div>

					<div class="clearfix"></div>


					<br><br><br><br> 
				</div>
			</div>
		</div>
 
<!-- endpage -->
@section('page-script')
 <script>
	 $(document).on('click', '.remove_job', function(){
	var id = $(this).attr('data-id');
	if(confirm('Are you sure you want to delete?')){
		window.location.href  = "{{route('user.delete-job')}}"+'/'+id;
	}
 });
 </script>
@endsection
@endsection
