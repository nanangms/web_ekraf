<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Pelaku Ekraf Jambi</title>

  <!-- Favicon -->
  <link rel="icon" href="{{asset('favicon.png')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" media="screen" href="{{ asset('homepage/css/theme.min.css') }}">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{asset('admin/plugins/bs-stepper/css/bs-stepper.min.css')}}">

</head>
<body class="page-wrapper bg-secondary">

<div class="container px-lg-7">
  <div class="card shadow-lg mx-0 mx-lg-7 my-3 my-lg-5 px-0 py-3 p-lg-4">
    <div class="text-center mb-4">
      <a href="/">
        <img src="{{asset('homepage/images/logo-ekraf-512p.png')}}" width="150px">
      </a>
    </div>

    <div class="card-body">
      <h4 class="login-box-msg">Pendaftaran Pelaku Ekraf Jambi</h4>
      <div>
        <div>
          Salam EKRAF! <br><br>

          Formulir ini diperuntukkan sebagai database Komite Ekonomi Kreatif Provinsi Jambi untuk mendata Pelaku Ekonomi Kreatif/ UMKM di Provinsi Jambi, baik di bidang jasa maupun produk. <br> <br>

          Komite Ekraf Jambi lahir berdasarkan SK Gubernur Jambi Nomor: 230/KEP. GUB/PSDA-1.1/2020.
        </div>

        <hr>

        <div>

          <!-- Alert validasi -->
          @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
              <div class="alert alert-warning">
                {{ $error }}
              </div>
            @endforeach
          @endif

          <div class="bs-stepper">
            <div class="bs-stepper-header row text-center" role="tablist">
              <div class="step col-md-3" data-target="#account-part">
                <button type="button" class="step-trigger pb-lg-5" role="tab" aria-controls="account-part" id="account-part-trigger" style="display: inline-block;">
                  <span class="bs-stepper-circle">1</span> <br>
                  <span class="bs-stepper-label" style="white-space: normal;">Buat Akun</span>
                </button>
              </div>
              <div class="col-md-1 px-lg-0">
                <div class="line col"></div>
              </div>
              <div class="step col-md-4 px-0" data-target="#logins-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger" style="display: inline-block;">
                  <span class="bs-stepper-circle">2</span> <br>
                  <span class="bs-stepper-label" style="white-space: normal;">Identitas Pemilik Usaha / Pelaku Ekraf</span>
                </button>
              </div>
              <div class="col-md-1 px-lg-0">
                <div class="line col"></div>
              </div>
              <div class="step col-md-3" data-target="#information-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="information-part" id="information-part-trigger" style="display: inline-block;">
                  <span class="bs-stepper-circle">3</span> <br>
                  <span class="bs-stepper-label" style="white-space: normal;">Identitas Usaha Pelaku Ekraf</span>
                </button>
              </div>
            </div>

            <div class="bs-stepper-content px-0">
              <!-- your steps content here -->
              <form action="/submit-pendaftaran" method="post">
                @csrf
                <!-- Buat Akun -->
                <div id="account-part" class="content" role="tabpanel" aria-labelledby="account-part-trigger">
                  <div class="mt-4">
                    <h4>Informasi Akun</h4>
                    <p>Digunakan untuk login kedalam aplikasi</p>
                    <hr>
                    <div class="form-group mb-3">
                      <label class="form-label" for="email">Email <span class="text-danger">*</span></label></label>
                      <input class="form-control" type="email" id="email" name="email" placeholder="Alamat email" value="{{old('email')}}" required>
                      <div class="form-text fw-semibold text-warning">Pastikan alamat email aktif</div>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label" for="password">Password <span class="text-danger">*</span></label>
                      <div class="password-toggle w-100">
                        <input class="form-control" type="password" name="password" id="password" placeholder="Password" required>
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                          <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                        </label>
                      </div>
                      <div id="password-strength-status"></div>
                    </div>
                    <div class="form-group mb-3">
                      <label class="form-label" for="confirm_password">Konfirmasi Password <span class="text-danger">*</span></label>
                      <div class="password-toggle w-100">
                        <input class="form-control" type="password" name="konfirmasi_password" id="confirm_password" placeholder="Ulangi password" required>
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                          <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                        </label>
                      </div>
                      <span class="alert form-text fw-semibold p-0" id='message'></span>
                    </div>
                  </div>

                  <div class="text-end">
                    <button class="btn btn-sm btn-translucent-primary border-1 border-primary" onclick="stepper.next()">Selanjutnya <i class="fa fa-arrow-right ms-2"></i></button>
                  </div>
                </div>

                <!-- Data pemilik usaha -->
                <div id="logins-part" class="content mt-4" role="tabpanel" aria-labelledby="logins-part-trigger">
                  <input type="hidden" name="kode_pelaku_ekraf" value="{{kode_acak(5)}}">
                  <div class="form-group mb-3">
                    <label class="form-label" for="kab_kota">Wilayah (Kabupaten/Kota) Tempat Usaha <span class="text-danger">*</span></label>
                    <select name="kab_kota_id" class="form-select" id="kab_kota" required>
                      <option value="">[Pilihan]</option>
                      @foreach($kab as $k)
                        <option value="{{$k->id}}" {{(old('kab_kota_id') == $k->id ) ? ' selected' : ''}}>{{$k->nama_kab_kota}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label" for="sektor">Sektor Kreatif <span class="text-danger">*</span></label>
                    <select name="sektor_id" class="form-select" id="sektor" required>
                      <option value="">[Pilihan]</option>
                      @foreach($sektor as $s)
                        <option value="{{$s->id}}" {{(old('sektor_id') == $s->id ) ? ' selected' : ''}}>{{$s->nama_sektor}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group mb-3">
                    <label for="nama_lengkap" class="form-label" for="nama_lengkap">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" class="form-control" value="{{old('nama_lengkap')}}" id="nama_lengkap" placeholder="Nama lengkap" required>
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label" for="no_ktp">No. KTP/SIM/Identitas Resmi <span class="text-danger">*</span></label>
                    <input type="text" name="no_ktp" id="no_ktp" class="form-control" placeholder="16 Digit" value="{{old('no_ktp')}}">
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label" for="alamat">Alamat Domisili <span class="text-danger">*</span></label>
                    <input type="text" name="alamat_domisili" class="form-control" id="" value="{{old('alamat_domisili')}}" placeholder="Alamat domisili sesuai KTP/SIM/Paspor">
                  </div>
                  <div class="form-group mb-3">
                    <label class="form-label" for="no_hp">No.HP/WA aktif yang dapat dihubungi<span class="text-danger">*</span></label>
                    <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="+62" value="{{old('no_hp')}}">
                  </div>

                  <div class="text-end mt-5">
                    <button class="btn btn-sm btn-translucent-primary border-1 border-primary" onclick="stepper.previous()"><i class="fa fa-arrow-left me-2"></i> Sebelumnya</button>
                    <button class="btn btn-sm btn-translucent-primary border-1 border-primary" onclick="stepper.next()">Selanjutnya <i class="fa fa-arrow-right ms-2"></i></button>
                  </div>
                </div>

                <!-- Detail usaha -->
                <div id="information-part" class="content mt-4" role="tabpanel" aria-labelledby="information-part-trigger">
                  <div class="form-group mb-3">
                    <label class="form-label" for="jenis_usaha">Jenis Usaha <span class="text-danger">*</span></label>
                    <div class="row">
                    <div class="col-md-2">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_usaha" id="jenis_usaha_barang" value="Barang" @if(old('jenis_usaha')) checked @endif>
                        <label for="jenis_usaha_barang" class="form-check-label">Barang</label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="jenis_usaha" id="jenis_usaha_jasa" value="Jasa" @if(old('jenis_usaha')) checked @endif>
                        <label for="jenis_usaha_jasa" class="form-check-label">Jasa</label>
                      </div>
                    </div>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group mb-3">
                    <label class="form-label" for="nama_usaha">Nama Usaha <span class="text-danger">*</span></label>
                    <input type="text" name="nama_usaha" class="form-control" id="nama_usaha" placeholder="Nama usaha" value="{{old('nama_usaha')}}" required>
                  </div>
                  <hr>

                  <!-- Form tambahan untuk jenis usaha: penyedia jasa -->
                  <div id="pelaku_jasa">
                    <div class="form-group mb-3">
                      <label class="form-label">Apakah Usaha Anda Menghasilkan Barang? <span class="text-danger">*</span></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="hasil_barang" id="hb1" value="Ada" @if(old('hasil_barang')) checked @endif>
                          <label class="form-check-label" for="hb1">Ya</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="hasil_barang" id="hb2" value="Tidak" @if(old('hasil_barang')) checked @endif>
                          <label class="form-check-label" for="hb2">Tidak </label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                      <label class="form-label">Apa Sifat Produk Bisnis Anda? <span class="text-danger">*</span></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sifat_produk" id="sp1" value="Jasa" @if(old('sifat_produk')) checked @endif>
                          <label class="form-check-label" for="sp1">Jasa</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sifat_produk" id="sp2" value="Barang Dan Jasa" @if(old('sifat_produk')) checked @endif>
                          <label class="form-check-label" for="sp2">Barang Dan Jasa</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                      <label class="form-label">Apakah Usaha Anda Dibina oleh Instansi Pemerintah/Swasta? <span class="text-danger">*</span></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="dibina" id="dibina1" value="Ya" @if(old('dibina')) checked @endif>
                          <label class="form-check-label" for="dibina1">Ya, Jika Ya Sebutkan:</label>
                          <div id="bina">
                            <input type="text" name="binaan" class="form-control" placeholder="Nama Instansi Pemerintah/Swasta" value="{{old('binaan')}}">
                          </div>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="dibina" id="dibina2" value="Tidak" @if(old('dibina')) checked @endif>
                          <label class="form-check-label" for="dibina2">Tidak</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                      <label class="form-label">Apakah Usaha Anda bersifat Freelance/Perorangan? <span class="text-danger">*</span></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sifat_freelance" id="ju1" value="Ya" @if(old('sifat_freelance')) checked @endif>
                          <label class="form-check-label" for="ju1">Ya</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="sifat_freelance" id="ju2" value="Tidak" @if(old('sifat_freelance')) checked @endif>
                          <label class="form-check-label" for="ju2">Tidak</label>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                      <label class="form-label">Apakah Anda Memiliki Sertifikat Khusus/ Keahlian? <span class="text-danger">*</span></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="ada_sertifikat" id="sertifikat1" value="Ada" @if(old('ada_sertifikat')) checked @endif>
                        <label class="form-check-label" for="sertifikat1">Ya</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="ada_sertifikat" id="sertifikat2" value="Tidak Ada" @if(old('ada_sertifikat')) checked @endif>
                        <label class="form-check-label" for="sertifikat2">Tidak Ada</label>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group mb-3">
                      <label class="form-label">Apakah Anda tergabung dalam Satu Komunitas/Asosiasi? <span class="text-danger">*</span></label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ada_komunitas" id="komunitas1" value="Ada" @if(old('ada_komunitas')) checked @endif>
                          <label class="form-check-label" for="komunitas1">Ya, Jika Ya Sebutkan:</label>
                          <div id="komunitas">
                            <input type="text" name="nama_komunitas" class="form-control" placeholder="Nama Komunitas/Asosiasi" value="{{old('nama_komunitas')}}">
                          </div>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="ada_komunitas" id="komunitas2" value="Tidak Ada" @if(old('ada_komunitas')) checked @endif>
                          <label class="form-check-label" for="komunitas2">Tidak Ada</label>
                        </div>
                    </div>
                    <hr>
                  </div>
                  <!-- /Form tambahan untuk jenis usaha: penyedia jasa -->

                  <div class="form-group mb-3">
                    <label class="form-label">Kapan Memulai Usaha? <span class="text-danger">*</span></label>
                    <input type="date" name="mulai_usaha" class="form-control" placeholder="" required value="{{old('mulai_usaha')}}">
                  </div>
                  <hr>
                  <div class="form-group mb-3">
                    <label class="form-label">Jumlah Karyawan <span class="text-danger">*</span></label>
                    <input type="number" name="jml_karyawan" class="form-control" id="" placeholder="Jumlah karyawan" required value="{{old('jml_karyawan')}}">
                  </div>
                  <hr>
                  <div class="form-group mb-3">
                    <label class="form-label" for="nama_lengkap">Alamat Tempat Usaha <span class="text-danger">*</span></label>
                    <input type="text" name="alamat_usaha" class="form-control" id="" placeholder="" required value="{{old('alamat_usaha')}}">
                    <div class="form-text fw-semibold text-warning">Mohon dituliskan alamat selengkapnya</div>
                  </div>
                  <hr>
                  <div class="form-group mb-3">
                    <label class="form-label" for="nama_lengkap">Ada Legalitas Usaha? (Hak Cipta / Hak Merek / HAKI / SIUP / TDP / HO / NIB) <span class="text-danger">*</span></label>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="ada_legalitas" id="legalitas1" value="Ada" @if(old('ada_legalitas')) checked @endif>
                        <label class="form-check-label" for="legalitas1">Ada, Jika Ada Sebutkan:</label>
                        <div id="legalitas"><input type="text" name="nama_legalitas" class="form-control" id="" placeholder="Nama Legalitas"></div>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="ada_legalitas" id="legalitas2" value="Tidak Ada" @if(old('ada_legalitas')) checked @endif>
                        <label class="form-check-label" for="legalitas2">Tidak Ada</label>
                      </div>
                  </div>
                  <hr>
                  <div class="form-group mb-3">
                    <label class="form-label" for="nama_lengkap">Badan Hukum Yang dimiliki (PT / CV / Firma, dll)<span class="text-danger">*</span></label>
                    <select name="badan_hukum_id" class="form-control" required>
                      <option value="">[Pilihan]</option>
                      @foreach($badan as $b)
                        <option value="{{$b->id}}" {{(old('badan_hukum_id') == $b->id ) ? ' selected' : ''}}>{{$b->nama_badan_hukum}}</option>
                      @endforeach
                    </select>
                    <div class="form-text fw-semibold text-warning">Jika tidak ada, pilih "Tidak Ada"</div>
                  </div>
                  <hr>
                  <div class="form-group mb-3">
                    <label class="form-label" for="nama_lengkap">Sistem Penjualan (bisa pilih lebih dari satu) <span class="text-danger">*</span></label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="sistem_penjualan[]" id="penjualan1" value="Langsung">
                      <label class="form-check-label" for="penjualan1">Langsung</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" name="sistem_penjualan[]" id="penjualan2" value="Online">
                      <label class="form-check-label" for="penjualan2">Online</label>
                    </div>
                  </div>
                  <hr>

                  <div class="form-group mb-3">
                    <label class="form-label" for="nama_lengkap">Jenis Media Online (Media online atau media sosial yang digunakan untuk memasarkan produk/jasa, bisa pilih lebih dari satu)  <span class="text-danger">*</span></label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="facebook" name="media_online[]" value="Facebook">
                      <label class="form-check-label" for="facebook">Facebook</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="instagram" name="media_online[]" value="Instagram">
                      <label class="form-check-label" for="instagram">Instagram</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="website" name="media_online[]" value="Website/Situs">
                      <label class="form-check-label" for="website">Website/Situs</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="marketplace" name="media_online[]" value="MarketPlace">
                      <label class="form-check-label" for="marketplace">Marketplace</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="ecommerce" name="media_online[]" value="Blanjo.co.id(e-commerce jambi)">
                      <label class="form-check-label" for="ecommerce">Blanjo.co.id (e-commerce Jambi)</label>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group mb-3">
                    <label class="form-label" for="nama_lengkap">Social media / Website / Landing page yang dimiliki (bisa pilih lebih dari satu) <span class="text-danger">*</span></label>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="sosmed1" name="sosmed[]" value="Facebook">
                      <label class="form-check-label" for="sosmed1">Facebook</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="sosmed2" name="sosmed[]" value="Instagram">
                      <label class="form-check-label" for="sosmed2">Instagram</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="sosmed3" name="sosmed[]" value="Website">
                      <label class="form-check-label" for="sosmed3">Website</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="sosmed4" name="sosmed[]" value="Twitter">
                      <label class="form-check-label" for="sosmed4">Twitter</label>
                    </div>
                  </div>

                  <div class="text-end mt-5">
                    <button class="btn btn-sm btn-translucent-primary border-1 border-primary" onclick="stepper.previous()"><i class="fa fa-arrow-left me-2"></i> Sebelumnya</button>
                    <button type="submit" class="btn btn-sm btn-primary">Daftar</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Main theme script-->
  <script src="{{ asset('homepage/js/theme.min.js') }}"></script>
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

  @elseif(session()->has('info'))
    swal("{{ session('info') }}");
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

    $('#confirm_password').on('keyup', function () {
      if ($('#password').val() == $('#confirm_password').val()) {
        $('#message').html('Password cocok').css('color', 'green');
      } else 
        $('#message').html('Password tidak cocok').css('color', 'red');
    });

    
  });
</script>
</body>
</html>
