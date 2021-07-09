@extends('frontend.layouts.default')
@section('content')
<div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
	<div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
	<div class="dashboard-content-inner" style="min-height: 191px;">
		
		<!-- Dashboard Headline -->
		<div class="dashboard-headline">
			<h3>Post a Job</h3>

			<!-- Breadcrumbs -->
			<nav id="breadcrumbs" class="dark">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Dashboard</a></li>
					<li>Post a Job</li>
				</ul>
			</nav>
		</div>

		<!-- Row -->
		<div class="row">

			<!-- Dashboard Box -->
			<div class="col-xl-12">
				<div class="dashboard-box margin-top-0">

					<!-- Headline -->
					<div class="headline">
						<h3><i class="icon-feather-folder-plus"></i> Job Submission Form</h3>
					</div>

					<div class="content with-padding padding-bottom-10">
						<div class="row">

							<div class="col-xl-4">
								<div class="submit-field">
									<h5>Job Title</h5>
									<input type="text" class="with-border">
								</div>
							</div>

							<div class="col-xl-4">
								<div class="submit-field">
									<h5>Job Type</h5>
									<div class="btn-group bootstrap-select with-border"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" title="Select Job Type"><span class="filter-option pull-left">Select Job Type</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Full Time</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Freelance</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Part Time</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Internship</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Temporary</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker with-border" data-size="7" title="Select Job Type" tabindex="-98"><option class="bs-title-option" value="">Select Job Type</option>
										<option>Full Time</option>
										<option>Freelance</option>
										<option>Part Time</option>
										<option>Internship</option>
										<option>Temporary</option>
									</select></div>
								</div>
							</div>

							<div class="col-xl-4">
								<div class="submit-field">
									<h5>Job Category</h5>
									<div class="btn-group bootstrap-select with-border"><button type="button" class="btn dropdown-toggle bs-placeholder btn-default" data-toggle="dropdown" role="button" title="Select Category"><span class="filter-option pull-left">Select Category</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button><div class="dropdown-menu open" role="combobox"><ul class="dropdown-menu inner" role="listbox" aria-expanded="false"><li data-original-index="1"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Accounting and Finance</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="2"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Clerical &amp; Data Entry</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="3"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Counseling</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="4"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Court Administration</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="5"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Human Resources</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="6"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Investigative</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="7"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">IT and Computers</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="8"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Law Enforcement</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="9"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Management</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="10"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Miscellaneous</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li><li data-original-index="11"><a tabindex="0" class="" data-tokens="null" role="option" aria-disabled="false" aria-selected="false"><span class="text">Public Relations</span><span class="glyphicon glyphicon-ok check-mark"></span></a></li></ul></div><select class="selectpicker with-border" data-size="7" title="Select Category" tabindex="-98"><option class="bs-title-option" value="">Select Category</option>
										<option>Accounting and Finance</option>
										<option>Clerical &amp; Data Entry</option>
										<option>Counseling</option>
										<option>Court Administration</option>
										<option>Human Resources</option>
										<option>Investigative</option>
										<option>IT and Computers</option>
										<option>Law Enforcement</option>
										<option>Management</option>
										<option>Miscellaneous</option>
										<option>Public Relations</option>
									</select></div>
								</div>
							</div>

							<div class="col-xl-4">
								<div class="submit-field">
									<h5>Location</h5>
									<div class="input-with-icon">
										<div id="autocomplete-container">
											<input id="autocomplete-input" class="with-border" type="text" placeholder="Type Address">
										</div>
										<i class="icon-material-outline-location-on"></i>
									</div>
								</div>
							</div>

							<div class="col-xl-4">
								<div class="submit-field">
									<h5>Salary</h5>
									<div class="row">
										<div class="col-xl-6">
											<div class="input-with-icon">
												<input class="with-border" type="text" placeholder="Min">
												<i class="currency">USD</i>
											</div>
										</div>
										<div class="col-xl-6">
											<div class="input-with-icon">
												<input class="with-border" type="text" placeholder="Max">
												<i class="currency">USD</i>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="col-xl-4">
								<div class="submit-field">
									<h5>Tags <span>(optional)</span>  <i class="help-icon" data-tippy-placement="right" data-tippy="" data-original-title="Maximum of 10 tags"></i></h5>
									<div class="keywords-container">
										<div class="keyword-input-container">
											<input type="text" class="keyword-input with-border" placeholder="e.g. job title, responsibilites">
											<button class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
										</div>
										<div class="keywords-list" style="height: auto;"><!-- keywords go here --></div>
										<div class="clearfix"></div>
									</div>

								</div>
							</div>

							<div class="col-xl-12">
								<div class="submit-field">
									<h5>Job Description</h5>
									<textarea cols="30" rows="5" class="with-border"></textarea>
									<div class="uploadButton margin-top-30">
										<input class="uploadButton-input" type="file" accept="image/*, application/pdf" id="upload" multiple="">
										<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
										<span class="uploadButton-file-name">Images or documents that might be helpful in describing your job</span>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-12">
				<a href="#" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post a Job</a>
			</div>

		</div>
		<!-- Row / End -->

		<!-- Footer -->
		<div class="dashboard-footer-spacer" style="padding-top: 125px;"></div>
		<div class="small-footer margin-top-15">
			<div class="small-footer-copyrights">
				© 2019 <strong>Hireo</strong>. All Rights Reserved.
			</div>
			<ul class="footer-social-links">
				<li>
					<a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Facebook">
						<i class="icon-brand-facebook-f"></i>
					</a>
				</li>
				<li>
					<a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Twitter">
						<i class="icon-brand-twitter"></i>
					</a>
				</li>
				<li>
					<a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Google Plus">
						<i class="icon-brand-google-plus-g"></i>
					</a>
				</li>
				<li>
					<a href="#" data-tippy-placement="top" data-tippy="" data-original-title="LinkedIn">
						<i class="icon-brand-linkedin-in"></i>
					</a>
				</li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<!-- Footer / End -->

	</div>
</div></div>
@endsection