@extends('user.layouts.default')
@section('content')
<!-- Dashboard Headline -->
<div class="dashboard-headline">
    <h3>Update Profile</h3>

    <!-- Breadcrumbs -->
    <nav id="breadcrumbs" class="dark">
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Dashboard</a></li>
            <li>Update Profile</li>
        </ul>
    </nav>
</div>
@include('user.includes.message')
<!-- Row -->
<div class="row">
<form action="{{route('home.profile.save')}}" method="post" enctype="multipart/form-data">
    @csrf
    <!-- Dashboard Box -->
    <div class="col-xl-12">
        <div class="dashboard-box margin-top-0">

            <!-- Headline -->
            <div class="headline">
                <h3><i class="icon-material-outline-account-circle"></i>Profile</h3>
            </div>

            <div class="content with-padding padding-bottom-0">

                
                <div class="row">
                    <div class="col-auto">
                        <div class="avatar-wrapper" data-tippy-placement="bottom" title="Change Avatar">
                            <img class="profile-pic" src="{{(Auth::guard('web')->user()->profile->profile_img)?asset('public/storage').'/'.Auth::guard('web')->user()->profile->profile_img:asset('public/frontend/images/user-avatar-placeholder.png')}}" alt="" />
                            <div class="upload-button"></div>
                            <input class="file-upload" type="file" accept="image/*" name="profile_img"/>
                        </div>
                    </div>

                    <div class="col">
                        <div class="row">

                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>Gender</h5>
                                    <select name="gender" class="selectpicker">
                                        <option value="">Select Your Gender</option>
                                        <option {{(Auth::guard('web')->user()->profile->gender=='male')?'selected':''}} value="male">male</option>
                                        <option {{(Auth::guard('web')->user()->profile->gender=='female')?'selected':''}} value="female">female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>Phone</h5>
                                    <input name="phone" type="text" class="with-border @error('phone')is-invalid @enderror" value="{{(Auth::guard('web')->user()->phone)?Auth::guard('web')->user()->phone:''}}">
                                    @error('phone')
              <div class="text-danger">
              {{$message}}
              </div>
              @enderror
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>State</h5>
                                    <input name="state" type="text" class="with-border" value="{{(Auth::guard('web')->user()->profile->state)?Auth::guard('web')->user()->profile->state  :''}}">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>Country</h5>
                                    <input type="text" name="country" class="with-border" value="{{(Auth::guard('web')->user()->profile->country)?Auth::guard('web')->user()->profile->country:''}}">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>City</h5>
                                    <input type="text" name="city" class="with-border" value="{{(Auth::guard('web')->user()->profile->city)?Auth::guard('web')->user()->profile->city:''}}">
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="submit-field">
                                    <h5>Zip Code</h5>
                                    <input type="text" name="zip_code" class="with-border" value="{{(Auth::guard('web')->user()->profile->zipcode)?Auth::guard('web')->user()->profile->zipcode:''}}">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Street Address</h5>
                                    <input type="text" name="address" class="with-border" value="{{(Auth::guard('web')->user()->profile->address)?Auth::guard('web')->user()->profile->address:''}}">
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

    <!-- Button -->
    <div class="col-xl-12">
        <button type="submit" class="button ripple-effect big margin-top-30">Save Changes</button>
    </div>
    </form>
</div>
<!-- Row / End -->
@endsection