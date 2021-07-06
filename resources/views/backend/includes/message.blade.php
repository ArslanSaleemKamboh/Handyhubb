@if($message=Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" id="success-alert" role="alert">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if($message=Session::get('error'))
<div class="alert alert-error alert-dismissible fade show" id="success-alert" role="alert">
  {{$message}}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif