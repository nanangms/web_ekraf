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
  <style>
            #frmCheckPassword {
                border-top: #F0F0F0 2px solid;
                background: #808080;
                padding: 10px;
            }

            .demoInputBox {
                padding: 7px;
                border: #F0F0F0 1px solid;
                border-radius: 4px;
            }

            #password-strength-status {
                padding: 5px 10px;
                color: #FFFFFF;
                border-radius: 4px;
                margin-top: 5px;
            }

            .medium-password {
                background-color: #b7d60a;
                border: #BBB418 1px solid;
            }

            .weak-password {
                background-color: #ce1d14;
                border: #AA4502 1px solid;
            }

            .strong-password {
                background-color: #12CC1A;
                border: #0FA015 1px solid;
            }
        </style>
</head>
<body class="register-page">
<div style="width: 70%">
  <div class="card card-outline card-primary" style="margin-top: 100px; margin-bottom: 100px">
    <div class="text-center">
      <img src="{{asset('images/LOGO_EKRAF-02.jpg')}}" width="200px">
      <!-- <a href="" class="h1"><b>EKRAF</b>JAMBI</a> -->
    </div>
    <div class="card-body">
      <p class="login-box-msg">Pendaftaran Pelaku Ekraf Jambi</p>

      <div class="row">
        <div class="col-md-12">
          <div class="card card-default">
            <div class="card-header">
              Salam EKRAF! <br><br>

              Formulir ini diperuntukkan sebagai data base Komite Ekonomi Kreatif Provinsi Jambi untuk mendata Pelaku Ekonomi Kreatif/ UMKM di Provinsi Jambi, baik di bidang jasa ataupun produk. <br> <br>

              Komite Ekraf Jambi lahir dari SK Gubernur Jambi Nomor: 230/KEP. GUB/PSDA-1.1/2020.
              @if(count($errors) > 0)
                  <div class="alert alert-warning">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li class="text-danger">{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            </div>
            <div class="card-body">
              <div class="bs-stepper">
                <div class="bs-stepper-header" role="tablist">
                  <!-- your steps here -->
                  <div class="step" data-target="#logins-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                      <span class="bs-stepper-circle">1</span>
                      <span class="bs-stepper-label">Identitas Pemilik Usaha/Pelaku Ekraf</span>
                    </button>
                  </div>
                  <div class="line"></div>
                  <div class="step" data-target="#information-part">
                    <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger">
                      <span class="bs-stepper-circle">2</span>
                      <span class="bs-stepper-label">Identitas Usaha Pelaku Ekraf</span>
                    </button>
                  </div>
                </div>
                <div class="bs-stepper-content">
                  <!-- your steps content here -->
                  <div id="logins-part" class="content" role="tabpanel" aria-labelledby="logins-part-trigger">
  <form action="/submit-pendaftaran" method="post">
    @csrf
    <input type="hidden" name="kode_pelaku_ekraf" value="{{kode_acak(5)}}">
                    <div class="form-group">
                      <label for="nama_lengkap">Kabupaten/Kota <span class="text-danger">*</span></label>
                      <select name="kab_kota_id" class="form-control" required>
                        <option value="">[Pilihan]</option>
                        @foreach($kab as $k)
                          <option value="{{$k->id}}">{{$k->nama_kab_kota}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama_lengkap">Sektor Kreatif <span class="text-danger">*</span></label>
                      <select name="sektor_id" class="form-control" required>
                        <option value="">[Pilihan]</option>
                        @foreach($sektor as $s)
                          <option value="{{$s->id}}">{{$s->nama_sektor}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                      <input type="text" name="nama_lengkap" class="form-control" id="" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="no_ktp">No. KTP/SIM/Identitas Resmi <span class="text-danger">*</span></label>
                      <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="16 Digit">
                    </div>
                    <div class="form-group">
                      <label for="alamat">Alamat Domisili <span class="text-danger">*</span></label>
                      <br>
                      <span class="text-info"><i>Mohon disesuikan dengan Identitas yang berlaku seperti KTP/SIM/Paspor</i></span>
                      <input type="text" name="alamat_domisili" class="form-control" id="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="no_hp">No.HP/WA <span class="text-danger">*</span></label><br>
                      <span class="text-info"><i>Harap memasukkan No.HP aktif yang dapat dihubungi</i></span>
                      <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="+62">
                    </div>
                  <div class="alert alert-warning">
                    <h4>Informasi Akun</h4>
                    <p>Digunakan untuk masuk kedalam aplikasi</p>
                    <hr>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email <span class="text-danger">*</span></label>
                      <input type="email" class="form-control" name="email" id="" placeholder="Email" required>
                      <span class="text-info"><i>Pastikan alamat email aktif</i></span>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                      <div id="password-strength-status"></div>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Konfirmasi Password <span class="text-danger">*</span></label>
                      <input type="password" class="form-control" name="konfirmasi_password" id="confirm_password" placeholder="Konfirmasi Password" required>
                      <span class="alert aler-success" id='message'></span>
                    </div>
                  </div>
                    <div class="text-right">
                        <button class="btn btn-primary" onclick="stepper.next()">Selanjutnya <i class="fa fa-arrow-right"></i></button>
                    </div>
                  </div>
                  <div id="information-part" class="content" role="tabpanel" aria-labelledby="information-part-trigger">
                    <div class="form-group">
                      <label for="jenis_usaha">Jenis Usaha <span class="text-danger">*</span></label>
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="jenis_usaha" value="Barang">
                          <label class="form-check-label">Barang</label>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="jenis_usaha" value="Jasa">
                          <label class="form-check-label">Jasa</label>
                        </div>
                      </div>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="nama_lengkap">Nama Usaha <span class="text-danger">*</span></label>
                      <input type="text" name="nama_usaha" class="form-control" id="" placeholder="" required>
                    </div>
                    <hr>
  <!-- untuk yang jasa -->
  <div id="pelaku_jasa">
    <div class="form-group">
      <label for="nama_lengkap">Apakah Usaha Anda Menghasilkan Barang? <span class="text-danger">*</span></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="hasil_barang" value="Ada">
          <label class="form-check-label">Ya</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="hasil_barang" value="Tidak">
          <label class="form-check-label">Tidak </label>
        </div>
    </div>
    <hr>
    <div class="form-group">
      <label for="nama_lengkap">Apa Sifat Produk Bisnis Anda? <span class="text-danger">*</span></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sifat_produk" value="Jasa">
          <label class="form-check-label">Jasa</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sifat_produk" value="Barang Dan Jasa">
          <label class="form-check-label">Barang Dan Jasa</label>
        </div>
    </div>
    <hr>
    <div class="form-group">
      <label for="nama_lengkap">Apakah Usaha Anda Dibina oleh Instansi Pemerintah/Swasta? <span class="text-danger">*</span></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="dibina" value="Ya">
          <label class="form-check-label">Ya, Jika Ya Sebutkan:</label>
          <div id="bina"><input type="text" name="binaan" class="form-control" placeholder="Nama Instansi Pemerintah/Swasta"></div>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="dibina" value="Tidak">
          <label class="form-check-label">Tidak</label>
        </div>
    </div>
    <hr>
    <div class="form-group">
      <label for="nama_lengkap">Apakah Usaha Anda bersifat Freelance/Perorangan? <span class="text-danger">*</span></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sifat_freelance" value="Ya">
          <label class="form-check-label">Ya</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sifat_freelance" value="Tidak">
          <label class="form-check-label">Tidak</label>
        </div>
    </div>
    <hr>
    <div class="form-group">
      <label for="nama_lengkap">Apakah Anda Memiliki Sertifikat Khusus/ Keahlian? <span class="text-danger">*</span></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="ada_sertifikat" value="Ada">
          <label class="form-check-label">Ya</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="ada_sertifikat" value="Tidak Ada">
          <label class="form-check-label">Tidak Ada</label>
        </div>
    </div>
    <hr>
    <div class="form-group">
      <label for="nama_lengkap">Apakah Anda tergabung dalam Satu Komunitas/Asosiasi? <span class="text-danger">*</span></label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="ada_komunitas" value="Ada">
          <label class="form-check-label">Ya, Jika Ya Sebutkan:</label>
          <div id="komunitas"><input type="text" name="nama_komunitas" class="form-control" placeholder="Nama Komunitas/Asosiasi"></div>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="ada_komunitas" value="Tidak Ada">
          <label class="form-check-label">Tidak Ada</label>
        </div>
    </div>
    <hr>
  </div>
                    <div class="form-group">
                      <label for="nama_lengkap">Kapan Memulai Usaha? <span class="text-danger">*</span></label>
                      <input type="date" name="mulai_usaha" class="form-control" id="" placeholder="" required>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="nama_lengkap">Jumlah Karyawan <span class="text-danger">*</span></label>
                      <input type="number" name="jml_karyawan" class="form-control" id="" placeholder="" required>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="nama_lengkap">Alamat Tempat Usaha <span class="text-danger">*</span></label><br>
                      <span class="text-info"><i>Mohon dituliskan alamat selengkap-lengkapnya</i></span>
                      <input type="text" name="alamat_usaha" class="form-control" id="" placeholder="" required>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="nama_lengkap">Ada Legalitas Usaha? <span class="text-danger">*</span></label><br>
                      <span class="text-info"><i>Contoh legalitas usaha adalah: Hak Cipta/ Hak Merek/ HAKI/ SIUP/TDP/HO/NIB. </i></span>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ada_legalitas" value="Ada">
                          <label class="form-check-label">Ada, Jika Ada Sebutkan:</label>
                          <div id="legalitas"><input type="text" name="nama_legalitas" class="form-control" id="" placeholder="Nama Legalitas" required></div>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ada_legalitas" value="Tidak Ada">
                          <label class="form-check-label">Tidak Ada</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="nama_lengkap">Badan Hukum Yang dimiliki (PT/CV/Firma, dll)<span class="text-danger">*</span></label><br>
                      <span class="text-info"><i>Jika tidak ada, Pilih TIDAK ADA</i></span>
                      <select name="badan_hukum_id" class="form-control" required>
                        <option value="">[Pilihan]</option>
                        @foreach($badan as $b)
                          <option value="{{$b->id}}">{{$b->nama_badan_hukum}}</option>
                        @endforeach
                      </select>
                    </div>
                    <hr>
                    <div class="form-group">
                      <label for="nama_lengkap">Sistem Penjualan <span class="text-danger">*</span></label><br>
                      <span class="text-info"><i>Bisa memilih salah satu atau keduanya </i></span>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="sistem_penjualan[]" value="Langsung" id="">
                        <label class="form-check-label" for="exampleCheck1">Langsung</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="sistem_penjualan[]" value="Online" id="">
                        <label class="form-check-label" for="exampleCheck1">Online</label>
                      </div>
                    </div>
                    <hr>

                    <div class="form-group">
                      <label for="nama_lengkap">JENIS MEDIA ONLINE (Media online atau media sosial apa yang sudah digunakan untuk memasarkan produk/jasa?)  <span class="text-danger">*</span></label>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="media_online[]" value="Facebook" id="">
                        <label class="form-check-label" for="exampleCheck1">Facebook</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" name="media_online[]" value="Instagram">
                        <label class="form-check-label" for="exampleCheck1">Instagram</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" name="media_online[]" value="Website/Situs">
                        <label class="form-check-label" for="exampleCheck1">Website/Situs</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" name="media_online[]" value="MarketPlace">
                        <label class="form-check-label" for="exampleCheck1">MarketPlace</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" name="media_online[]" value="Blanjo.co.id(e-commerce jambi)">
                        <label class="form-check-label" for="exampleCheck1">Blanjo.co.id(e-commerce jambi)</label>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="nama_lengkap">Sosial Media/Website/Landingpage yang dimiliki <span class="text-danger">*</span></label>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" name="sosmed[]" value="Facebook">
                        <label class="form-check-label" for="exampleCheck1">Facebook</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" name="sosmed[]" value="Instagram">
                        <label class="form-check-label" for="exampleCheck1">Instagram</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" name="sosmed[]" value="Website">
                        <label class="form-check-label" for="exampleCheck1">Website</label>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="" name="sosmed[]" value="Twitter">
                        <label class="form-check-label" for="exampleCheck1">Twitter</label>
                      </div>
                    </div>
                    
                    <div class="text-right">
                      <button class="btn btn-primary" onclick="stepper.previous()"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                      <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
</form>
                  </div>
                </div>
              </div>
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
