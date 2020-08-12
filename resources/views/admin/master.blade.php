<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('plugin/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- Data tables --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
    {{-- Select2 --}}
    <link href="{{ asset('select2/select2.min.css') }}" rel="stylesheet">
    @yield('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper bg-light">



@include('admin.navbar')

@include('admin.sidebar')

@yield('content')

<div class="content-wrapper">
</div>

{{-- Footer --}}
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.0.4
        </div>
    </footer>
  

</div>
<!-- ./wrapper -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('plugin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('plugin/dist/js/adminlte.js')}}"></script>
    {{-- data tables --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            responsive: true
        });
    } );
    </script>
    {{-- Sweet Alert --}}
    <script src="{{ asset('sweetAlert/sweetalert2.all.min.js') }}"></script>
    {{-- My script --}}
    <script src="{{ asset('js/myscript.js') }}"></script>
    {{-- Select2 --}}
    <script src="{{ asset('select2/select2.min.js') }}"></script>
    <script>
        $(".selectRekomen").select2({
            placeholder: "Rekomendasi Sekolah"
        });
    </script>
    @yield('js')

</body>
</html>
