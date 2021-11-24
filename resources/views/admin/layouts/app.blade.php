<!DOCTYPE html>
<html lang="en">
<head>
  @php
        $SiteSetting = App\Models\SiteSetting::find(1);
    @endphp
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="{{ asset($SiteSetting->logo) }}">
    <title>{{ $SiteSetting->title }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
  {{-- toster css --}}
  <link rel="stylesheet" href="{{ asset('admin/dist/css/toster.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/texteditor/dist/ui/trumbowyg.min.css') }}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
 @include('admin.layouts.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.layouts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @yield('admin')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @php
        $SiteSetting = App\Models\SiteSetting::find(1);
    @endphp
  <footer class="main-footer">
    <strong>Copyright &copy; {{date("Y");}} <a href="#"></a>{{ $SiteSetting->title }}.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block"> 
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('admin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('admin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('admin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('admin/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('admin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.js') }}"></script>
{{-- toster js --}}
<script src="{{ asset('admin/dist/js/toster.js') }}"></script>
{{-- sweetalert js  --}}
<script src="{{ asset('admin/dist/js/sweetalert.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('admin/dist/js/pages/dashboard.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
{{-- text editor plugin --}}
<script src="{{ asset('admin/texteditor/dist/trumbowyg.min.js') }}"></script>
<script>
  $('textarea').trumbowyg();
</script>
<script>
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
  </script>
      <script> 
       
        $(document).on('click','#delete',function(e){
         e.preventDefault();
         var link = $(this).attr("href");
                 Swal.fire({
                 title: 'Are you sure?',
                 text: "You want to delete this data!",
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: 'rgb(14, 165, 94)',
                 cancelButtonColor: '#d33',
                 confirmButtonText: 'Yes, delete it!'
                 }).then((result) => {
                 if (result.isConfirmed) {
                 window.location.href = link;
                     Swal.fire(
                     'Deleted!',
                     'Your file has been deleted.',
                     'success'
                     )
                 }
                 })
 
         }); 
         
         
     </script> 
      <script>
         @if(Session::has('message'))
           var type="{{Session::get('alert-type','info')}}"
           switch(type){
               case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
               case 'success':
                   toastr.success("{{ Session::get('message') }}");
                   break;
               case 'warning':
                  toastr.warning("{{ Session::get('message') }}");
                   break;
               case 'error':
                   toastr.error("{{ Session::get('message') }}");
                   break;
           }
         @endif
      </script>
</body>
</html>
