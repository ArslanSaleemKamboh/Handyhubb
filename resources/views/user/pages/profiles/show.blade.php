@extends('user.layouts.default')
@section('content')
<!-- Dashboard Headline -->
<div class="dashboard-headline">
    <h3>Profile</h3>

    <!-- Breadcrumbs -->
    <nav id="breadcrumbs" class="dark">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li>Profile</li>
        </ul>
    </nav>
</div>
@if(!Auth::user()->hasVerifiedEmail())
<div class="notification notice closeable">
				<p>Your email address is not verified. Please <a href="{{route('verification.send')}}" 
                onclick="event.preventDefault();
                            document.getElementById('email-verify-form').submit();"
                >verify it here.</a></p>
				<a class="close"></a>
			</div>
            <form id="email-verify-form" method='POST' action="{{route('verification.send')}}" class="d-none">
                                        @csrf
                                    </form>
@endif
<!-- Row -->
<div class="row">
    <!-- Dashboard Box -->
    <div class="col-xl-12">
        <div class="dashboard-box margin-top-0">

            <!-- Headline -->
            <div class="headline d-flex justify-content-between align-items-baseline">
                <h3><i class="icon-material-outline-account-circle"></i>Profile</h3>
                    <!-- Button -->
        <a href="{{route('home.profile.update')}}" class="button ripple-effect small">Edit</a>
            </div>
            

            <div class="content with-padding padding-bottom-0">

                
                <div class="row">
                    <div class="col-12">
                        <div class="avatar-wrapper rounded-circle mx-auto" >
                            <img class="profile-pic" src="{{(isset(Auth::user()->profile->profile_img))?asset('public/storage').'/'.Auth::user()->profile->profile_img:asset('public/frontend/images/user-avatar-placeholder.png')}}" alt="" />
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">
                        <div class="col-xl-6 padding-left-230">
                                <div class="submit-field">
                                    <h5>Name</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->name))?Auth::user()->name:''}}</p>
                                </div>
                            </div>
                        <div class="col-xl-6 padding-left-230">
                                <div class="submit-field">
                                    <h5>Email</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->email))?Auth::user()->email:''}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 padding-left-230">
                                <div class="submit-field">
                                    <h5>Gender</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->profile->gender))?Auth::user()->profile->gender:''}}</p>
                                </div>
                            </div>

                            <div class="col-xl-6 padding-left-230">
                                <div class="submit-field">
                                    <h5>Phone</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->phone))?Auth::user()->phone:''}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 padding-left-230">
                                <div class="submit-field">
                                    <h5>State</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->profile->state))?Auth::user()->profile->state:'NULL'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 padding-left-230">
                                <div class="submit-field">
                                    <h5>Country</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->profile->country))?Auth::user()->profile->country:'NULL'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 padding-left-230">
                                <div class="submit-field">
                                    <h5>City</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->profile->city))?Auth::user()->profile->city:'NULL'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-6 padding-left-230">
                                <div class="submit-field">
                                    <h5>Zip Code</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->profile->zipcode))?Auth::user()->profile->zipcode:'NULL'}}</p>
                                </div>
                            </div>
                            <div class="col-xl-12 padding-left-230">
                                <div class="submit-field">
                                    <h5>Street Address</h5>
                                    <p name="name" type="text" class="with-border ">{{(isset(Auth::user()->profile->address))?Auth::user()->profile->address:'NULL'}}</p>
                                </div>
                            </div>

                            <!-- <div class="col-xl-6">
											<div class="submit-field">
												<h5>Account Type</h5>
												<div class="account-type">
													<div>
														<input type="radio" name="account-type-radio" id="freelancer-radio" class="account-type-radio" checked/>
														<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
													</div>

													<div>
														<input type="radio" name="account-type-radio" id="employer-radio" class="account-type-radio"/>
														<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
													</div>
												</div>
											</div>
										</div> -->

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


</div>
<!-- Row / End -->
@endsection