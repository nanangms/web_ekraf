<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title')</title>

  <!-- Favicon -->
  <link rel="icon" href="{{asset('favicon.png')}}">

  <!-- General CSS Files -->
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <meta name="msapplication-TileColor" content="#766df4">
  <meta name="theme-color" content="#ffffff">

  <!-- CSS Libraries -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Template CSS -->
  <!-- <link rel="stylesheet" href="{{ asset('homepage/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('homepage/css/components.css') }}"> -->

  <!-- Vendor Styles-->
  <link rel="stylesheet" media="screen" href="{{ asset('homepage/vendor/simplebar/dist/simplebar.min.css') }}"/>
  <link rel="stylesheet" media="screen" href="{{ asset('homepage/vendor/tiny-slider/dist/tiny-slider.css') }}"/>
  <link rel="stylesheet" media="screen" href="{{ asset('homepage/vendor/flatpickr/dist/flatpickr.min.css') }}"/>
  <link rel="stylesheet" media="screen" href="{{ asset('homepage/vendor/lightgallery.js/dist/css/lightgallery.min.css') }}"/>

  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="{{ asset('homepage/css/theme.min.css') }}">

  <!-- Custom CSS -->
  <link rel="stylesheet" media="screen" href="{{ asset('homepage/css/custom.css') }}">
  @yield('header')
</head>

<body class="is-sidebar">
  <main class="page-wrapper">

    @include('homepage.layouts.navbar')

      <!-- Main Content -->
      <div>
        @yield('content')
      </div>

  </main>

  <footer class="site-footer bg-dark pt-5 pb-4">
    <div class="container d-md-flex align-items-center text-center">
      <div style="color: white;">Connect With Us : &nbsp;&nbsp;&nbsp;</div>
      <div>
        <a href="https://facebook.com/" class="btn-social bs-facebook" title="">
          <i class="fab fa-facebook-f"></i>
        </a>

        <a href="https://twitter.com/" class="btn-social bs-twitter" title="">
          <i class="fab fa-twitter"></i>
        </a>

        <a href="https://instagram.com/" class="btn-social bs-instagram" title="">
          <i class="fab fa-instagram"></i>
        </a>

        <a href="mailto:" class="btn-social bs-instagram" title="">
          <i class="fa fa-envelope"></i>
        </a>
     
      </div>
    </div>

    <div class="container d-md-flex justify-content-between align-items-center text-center">
      <ul class="list-inline fs-sm mb-3 order-md-2">
        <li class="list-inline-item my-1"><a class="nav-link-style nav-link-light" href="/kontak">Kontak</a></li>
        <li class="list-inline-item my-1"><a class="nav-link-style nav-link-light" href="/faqaboutekraf">FAQ</a></li>
        <li class="list-inline-item my-1"><a class="nav-link-style nav-link-light" href="/syarat-dan-ketentuan">Syarat &amp; Ketentuan</a></li>
      </ul>

      <p class="fs-sm mb-3 order-md-1">
        <span class="text-light opacity-50 me-1">© 2021. Komite Ekraf Jambi. Developed by:</span>
        <a class="nav-link-style nav-link-light" href="#" target="_blank" rel="noopener">Digilab Mitra Integrasi</a>
      </p>
    </div>
  </footer>

  <!-- Back to top button-->
  <a class="btn-scroll-top" href="#top" data-scroll data-fixed-element>
    <span class="btn-scroll-top-tooltip text-muted fs-sm me-2"></span><i class="btn-scroll-top-icon fas fa-arrow-up"></i>
  </a>

  <!-- Vendor scrits: js libraries and plugins-->
  <script src="{{ asset('homepage/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/simplebar/dist/simplebar.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/jarallax/dist/jarallax.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/tiny-slider/dist/min/tiny-slider.js') }}"></script>
  <script src="{{ asset('homepage/vendor/flatpickr/dist/flatpickr.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/flatpickr/dist/plugins/rangePlugin.js') }}"></script>
  <script src="{{ asset('homepage/vendor/lightgallery.js/dist/js/lightgallery.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/lg-fullscreen.js/dist/lg-fullscreen.min.js') }}"></script>
  <script src="{{ asset('homepage/vendor/lg-zoom.js/dist/lg-zoom.min.js') }}"></script>

  <!-- Main theme script-->
  <script src="{{ asset('homepage/js/theme.min.js') }}"></script>
  @yield('footer')
</body>
</html>