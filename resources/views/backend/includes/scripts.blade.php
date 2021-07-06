<script src="{{asset('public/backend/js/app.min.js')}}" ></script>
<script src="{{asset('public/backend/js/theme/default.min.js')}}"></script>
<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="{{asset('public/backend/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('public/backend/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('public/backend/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
	<script src="{{asset('public/backend/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
	<script src="{{asset('public/backend/js/demo/table-manage-default.demo.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script src="{{asset('public/backend/plugins/sweetalert/dist/sweetalert.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>
<!-- <script>
$( document ).ready(function() {
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
});
</script> -->
<script>
window.addEventListener('show-model',function(event){
  $('#show-model').modal('show');
})
window.addEventListener('hide-model',function(event){
  $('#show-model').modal('hide');
   location.reload()
   toastr.success(event.detail.message)

})
window.addEventListener('show-delete-model',function(event){
  $('#delete-model').modal('show');
})
window.addEventListener('hide-delete-model',function(event){
  $('#delete-model').modal('hide');
  location.reload()
  toastr.success(event.detail.message)
})
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-bottom-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "1000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
window.addEventListener('success',function(event){
  toastr.success(event.detail.message)
})
window.addEventListener('error',function(event){
  toastr.error(event.detail.message)
})
</script>
<script>
$("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
$("#error-alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#success-alert").slideUp(500);
});
</script>