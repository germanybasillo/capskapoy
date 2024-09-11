<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
        <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
         <link rel="stylesheet" href="{{asset('assets/tables/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">   
         <style type="text/css">
            td p {
               margin: -0.3rem;
               font-size: 0.9rem;
            }
            aside.main-sidebar{
               background-color: #05445E;
               color:#ddd;
            }
            nav ul li a p{
               color:#ddd;
            }
            nav ul li a i{
               color:#ddd;
            }
         </style>
      </head>
      <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
            <div class="content-wrapper">
                <div class="content-header">
                        {{ $header }}
                    </div>
                </div>
            @endisset

            <!-- Page Content -->
            <section class="content">
                {{ $slot }}
            </section>
        </div>
       <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2024-2025 <a href="#">HOMIES</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Capstone</b> 2
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>

        
  <!-- jQuery -->
  <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- ChartJS -->
  <script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
  <!-- overlayScrollbars -->
  <script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('assets/js/adminlte.js')}}"></script>   
   <!-- DataTables  & Plugins -->
   <script src="{{asset('assets/tables/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('assets/tables/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
   <script src="{{asset('assets/tables/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
   <script src="{{asset('assets/tables/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
  <script>
      $(function () {
         $("#example1").DataTable();
      });
   </script>
</body>

</html>

