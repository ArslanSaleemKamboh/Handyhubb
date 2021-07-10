<script>
var toastMixin = Swal.mixin({
    toast: true,
    icon: 'success',
    title: 'General Title',
    animation: false,
    position: 'bottom-right',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  });
</script>
@if($message=Session::get('success'))
<script>
toastMixin.fire({
    animation: true,
    title: '{{$message}}'
  });
</script>
<!-- <div class="notification success closeable">
				<p> {{$message}}</p>
				<a class="close"></a> -->
			</div>
@endif
@if($message=Session::get('error'))
<script>
 toastMixin.fire({
    title: '{{$message}}',
    icon: 'error'
  });
</script>
@endif