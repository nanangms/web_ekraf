<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Pelaku Ekraf Jambi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bs-stepper/css/bs-stepper.min.css')}}">
  
</head>
<body class="register-page">
<div>
  <div class="card card-outline card-primary" style="margin-top: 100px; margin-bottom: 100px">
    <div class="text-center">
      <img src="{{asset('images/LOGO_EKRAF-02.jpg')}}" width="200px">
      <!-- <a href="" class="h1"><b>EKRAF</b>JAMBI</a> -->
    </div>
    <div class="card-body">
      <p class="login-box-msg">Pendaftaran Berhasil</p>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            
            <div class="card-body">
              Pendaftaran Berhasil, Admin akan mengecek terlebih dahulu data pendaftaran anda. jika akun anda telah diverifikasi akan menerima notifikasi email
              <br>
              <a href="/" class="btn btn-success btn-block"><i class="fa fa-arrow-left"></i> Kembali ke Beranda</a> 
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
             
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('admin/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<script src="{{asset('mask_plugin/dist/jquery.mask.min.js')}}"></script>
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

        @endif
</script>
<script>
    // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function () {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  });

</script>
<script type="text/javascript"> 
  $(document).ready(function() {
    $('#no_ktp').mask('0000000000000000');
    $('#no_hp').mask('+62 0000 0000 00000');
    $('#pelaku_jasa').hide();
    $('#legalitas').hide();
    $('#komunitas').hide();
    $('#bina').hide();

    $('input[type=radio][name=jenis_usaha]').change(function() {
      if($(this).val() == "Jasa") {
        $('#pelaku_jasa').show();
      }else {
        $('#pelaku_jasa').hide();
      }
    });

    $('input[type=radio][name=ada_legalitas]').change(function() {
      if($(this).val() == "Ada") {
        $('#legalitas').show();
      }else {
        $('#legalitas').hide();
      }
    });

    $('input[type=radio][name=ada_komunitas]').change(function() {
      if($(this).val() == "Ada") {
        $('#komunitas').show();
      }else {
        $('#komunitas').hide();
      }
    });

    $('input[type=radio][name=dibina]').change(function() {
      if($(this).val() == "Ya") {
        $('#bina').show();
      }else {
        $('#bina').hide();
      }
    });

    $('#password, #confirm_password').on('keyup', function () {
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Matching').css('color', 'green');
      } else 
        $('#message').html('Not Matching').css('color', 'red');
    });

    
  });
</script>
</body>
</html>
