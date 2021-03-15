<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Aplikasi Pendataan Pelaku Kreatif Jambi">
  <meta name="keywords" content="Ekraf Jambi, Ekonomi kreatif, Jambi">
  <title>@yield('title') | Admin - EKRAF Jambi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="icon" href="{{asset('favicon.png')}}">
  @yield('header')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  @include('layouts.topbar')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar elevation-4 sidebar-dark-warning" style="background-image: url({{asset('images/bg_admin2.jpg')}});background-repeat: no-repeat; background-position:left bottom; background-color: #37384E">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
      <img src="{{asset('homepage/images/emblem-logo.png')}}" alt="Logo" class="brand-image"> 
      <span class="brand-text font-weight-light">
        <img src="{{asset('homepage/images/text-logo.png')}}" width="52px">
      </span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar" >
      @include('layouts.sidebar')

      @include('layouts.menu')
    </div>
    <!-- /.sidebar -->
  </aside>

  @yield('content')

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <img src="{{asset('images/LOGO_EKRAF-02.jpg')}}" width="30px"> EKRAF Jambi
    </div>
    Copyright &copy; 2021 Support by: <a href="https://diskominfo.jambikota.go.id">Digitrain.</a>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

@yield('footer')
<!-- Sweet alert -->
<script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
<script>
//flash message
        @if(session()->has('sukses'))
        swal({
            type: "success",
            icon: "success",
            title: "BERHASIL!",
            text: "{{ session('sukses') }}",
            timer: 1500,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });
        @elseif(session()->has('gagal'))
        swal({
            type: "error",
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('gagal') }}",
            timer: 3000,
            showConfirmButton: false,
            showCancelButton: false,
            buttons: false,
        });

        @elseif(session()->has('info'))
          swal("Pendaftaran Gagal!!", "{{ session('info') }}");
        @endif
</script>

</body>
</html>