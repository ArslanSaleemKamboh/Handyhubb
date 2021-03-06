@extends('user.layouts.default')
@section('content')

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
        @include('user.includes.message')
        <form action="{{ route('user.add-Job') }}" method="POST" id="job_form" enctype="multipart/form-data">
            {{ csrf_field() }}
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
                                    <input type="hidden" name="edit_id" value="{{isset($data)?$data['id']:''}}">
                                    <input type="text" name="title" class="with-border" maxlength="200" value="{{isset($data)?$data['title']:old('title')}}">
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Job Type</h5>
                                    <select class="selectpicker with-border" name="type" data-size="7"
                                        title="Select Job Type">
                                        <option value="full time" {{isset($data)&& $data['type'] == 'full time' ? 'selected':''}}>Full Time</option>
                                        <option value="freelance" {{isset($data)&& $data['type'] == 'freelance' ? 'selected':''}}>Freelance</option>
                                        <option value="part time" {{isset($data)&& $data['type'] == 'part time' ? 'selected':''}}>Part Time</option>
                                        <option value="trial period" {{isset($data)&& $data['type'] == 'trial period' ? 'selected':''}}>Trial period</option>
                                        <option value="temporary" {{isset($data)&& $data['type'] == 'temporary' ? 'selected':''}}>Temporary</option>
                                    </select>
                                </div>
                                <label id="type-error" class="error" for="type" style="display: none">This field is required</label>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Job Category</h5> 
                                    @php
                                    $ids = []; 
                                    if (isset($data)) {
                                        $ids = $data->getCategory->pluck('category_id')->toArray();
                                    }
                                       
                                    @endphp
                                    <select class="selectpicker with-border" name="category[]" data-size="7" title="Select Category" multiple>
                                        <option>Please select category</option>
                                       @foreach ($category as $val)
                                       <option value="{{$val->id}}" {{isset($data)&& in_array($val->id, $ids)? 'selected':''}}> {{$val->title}}</option>
                                       @endforeach 
                                       
                                    </select>
                                </div>
                                <label id="category[]-error" class="error" for="category[]" style="display: none">This field is required</label>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Location</h5>
                                    <div class="input-with-icon">
                                        <div id="autocomplete-container">
                                            <input id="autocomplete-input" name="location" class="with-border" type="text"
                                                placeholder="Type Address"  value="{{isset($data)?$data['location']:old('location')}}">
                                        </div>
                                        <i class="icon-material-outline-location-on"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Salary Per Hour</h5>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="input-with-icon">
                                                <input class="with-border" name="salary_per_hour" type="number" min="0"
                                                    maxlength="1000" placeholder="Salary Per Hour" value="{{isset($data)?$data['salary_per_hour']:old('salary_per_hour')}}">
                                                <i class="currency">USD</i>
                                            </div>
                                        </div>
                                        <label id="salary_per_hour-error" class="error" for="salary_per_hour"  style="display: none">This field is required.</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4">
                                <div class="submit-field">
                                    <h5>Tags <span>(optional)</span> <i class="help-icon" data-tippy-placement="right"
                                            title="Maximum of 10 tags"></i></h5>
                                    <div class="keywords-container">
                                        <div class="keyword-input-container">
                                            <input type="hidden" name="tags" id="added_tags" value="{{(isset($data['tags'])?$data['tags']:'')}}">
                                            <input type="text" class="keyword-input with-border"
                                                placeholder="e.g. job title, responsibilites" />
                                            <button class="keyword-input-button ripple-effect"><i
                                                    class="icon-material-outline-add"></i></button>
                                        </div>
                                        <div class="keywords-list">
                                            <!-- keywords go here -->
                                            @php 
                                                $tags = [];
                                                if (isset($data['tags'])) {
                                                   $tags = explode(',', $data['tags']);
                                                }                                                       
                                                @endphp
                                                @foreach ($tags as $tag)
                                            <span class="keyword"><span class="keyword-remove"></span><span class="keyword-text">{{$tag}}</span></span>
                                            @endforeach
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>

                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Job Description</h5>
                                    <textarea cols="10" rows="2" name="description" id="description" class="with-border">{{isset($data)?$data['description']:old('description')}}</textarea>
                                    
                                     <div class="uploadButton margin-top-30">
                                        <input class="uploadButton-input" type="file" name="filename[]" id="upload" multiple />
                                        <label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
                                        <span class="uploadButton-file-name">Images or documents that might be helpful in
                                            describing your job</span>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-xl-12">
                                <div class="submit-field">
                                    <h5>Status</h5>
                                    <select class="selectpicker with-border" name="status" title="Status">
                                        <option value="">Please select status</option>
                                        <option value="1" {{isset($data)&& $data['status'] == 1 ? 'selected':''}}>Active</option>
                                        <option value="0"  {{isset($data)&& $data['status'] == 0 ? 'selected':''}}>In-Active</option>
                                    </select>
                                </div>
                                <label id="status-error" class="error" for="status" style="display: none">This field is required</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xl-12">
                <button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post
                    a Job</button>
            </div>
        </form>
    </div>
    <!-- Row / End -->
@section('page-script') 
<script>
    $("#job_form").validate({
    rules: {
        title: {
      required: true,
      normalizer: function( value ) { 
        return $.trim( value );
      }},
        type: {
      required: true,
      normalizer: function( value ) { 
        return $.trim( value );
      }}, 
        'category[]': {
      required: true,
      normalizer: function( value ) { 
        return $.trim( value );
      }}, 
        description: {
      required: true,
      normalizer: function( value ) { 
        return $.trim( value );
      }}, 
        location: {
      required: true,
      normalizer: function( value ) { 
        return $.trim( value );
      }},
        salary_per_hour: {
      required: true,
      normalizer: function( value ) { 
        return $.trim( value );
      }}, 
        status: {
      required: true,
      normalizer: function( value ) { 
        return $.trim( value );
      }}
    },
    messages: {
        title: "This field is required",
        type: "This field is required", 
        'category[]': "This field is required", 
        description: "This field is required", 
        location: "This field is required", 
        salary_per_hour: "This field is required", 
        status: "This field is required", 
    }
});

</script>
@endsection
@endsection
