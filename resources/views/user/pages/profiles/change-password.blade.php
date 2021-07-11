@extends('user.layouts.default')
@section('content')
<!-- Dashboard Headline -->
<div class="dashboard-headline">
    <h3>Change Password</h3>

    <!-- Breadcrumbs -->
    <nav id="breadcrumbs" class="dark">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li>Change Password</li>
        </ul>
    </nav>
</div>
<!-- Row -->
<form method="post" action="{{route('home.update_password')}}">
@csrf
<div class="row">
<div class="col-xl-12">
					<div id="test1" class="dashboard-box">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-lock"></i> Password &amp; Security</h3>
						</div>

						<div class="content with-padding">
							<div class="row">
								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Current Password</h5>
										<input type="password"  name="current_password" value="{{old('current_password')}}" class="with-border @error('current_password')border-danger @enderror">
                                        @error('current_password')
                                        <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>New Password</h5>
										<input type="password" name="password" value="{{old('password')}}" class="with-border @error('current_password')border-danger @enderror">
                                        @error('password')
                                        <span class="text-danger small" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Confirm Password</h5>
										<input type="password" name="password_confirmation"  class="with-border @error('password')border-danger @enderror">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="col-xl-12">
					<button type="submit" class="button ripple-effect big margin-top-30">Save Changes</a>
				</div>
</div>
</form>
<!-- Row / End -->
@endsection