@extends('layouts.app')

@section('title')
Profil Usaha
@endsection
@section('header')
<!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/plugins/summernote/summernote-bs4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Profil Usaha</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/pengguna/dashboard">Profil Usaha</a></li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Profil Usaha</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
<!--         <a href="" class="btn btn-info">Lihat Tampilan Utama</a> -->
        <hr>
        <div class="alert alert-warning">
          Lengkapi data anda dengan benar
        </div>
        <!-- Alert validasi -->
          @if(count($errors) > 0)
            @foreach ($errors->all() as $error)
              <div class="alert alert-danger">
                {{ $error }}
              </div>
            @endforeach
          @endif
        <div class="card card-primary card-tabs">
          <div class="card-header p-0 pt-1">
            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Profil Usaha</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Kontak Usaha</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Profil Pemilik Usaha</a>
              </li>
              
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-one-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                
                <center>
                  @if($pelaku->foto_usaha == Null)
                  <img src="{{asset('images/default_gbr_usaha.jpg')}}">
                  @else
                  <img src="{{asset('images/foto_usaha/'.$pelaku->foto_usaha)}}" width="750" height="500">
                  @endif
                </center>
                <form action="/pengguna/profil-usaha/update" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="kode_pelaku_ekraf" value="{{$pelaku->kode_pelaku_ekraf}}">
                  
          <span class="text-danger"><i>* Wajib diisi</i></span>
                <div class="form-group">
                  <label class="form-label" for="">Logo Usaha <span class="text-danger">*</span></label>
                  <input type="file" name="foto_usaha" id="foto_usaha" class="form-control" onchange="readURL(this);">
                  <div style="overflow: hidden">
                      <img id="preview_gambar" src="" style="width: 100px; height: auto;" />
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label" for="">Sektor Usaha <span class="text-danger">*</span></label>
                      <select name="sektor_id" class="form-control" id="sektor" required>
                        <option value="">[Pilihan]</option>
                        @foreach($sektor as $s)
                          <option value="{{$s->id}}" @if($pelaku->sektor_id == $s->id) selected @endif>{{$s->nama_sektor}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Kota/Kabupaten <span class="text-danger">*</span></label>
                      <select name="kab_kota_id" class="form-control" id="kab_kota" required>
                        <option value="">[Pilihan]</option>
                        @foreach($kab as $k)
                          <option value="{{$k->id}}" @if($pelaku->kab_kota_id == $k->id) selected @endif>{{$k->nama_kab_kota}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Bentuk Usaha/Perusahaan <span class="text-danger">*</span></label>
                      <select name="badan_hukum_id" class="form-control" required>
                        <option value="">[Pilihan]</option>
                        @foreach($badan as $b)
                          <option value="{{$b->id}}" @if($pelaku->badan_hukum_id == $b->id) selected @endif>{{$b->nama_badan_hukum}}</option>
                        @endforeach
                      </select>
                    </div>
                    
                    
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label" for="">Nama Usaha <span class="text-danger">*</span></label>
                      <input type="text" name="nama_usaha" id="nama_usaha" class="form-control" placeholder="" value="{{$pelaku->nama_usaha}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">No. SIUP (Surat Izin Usaha Perusahaan)</label>
                      <input type="text" name="siup_usaha" id="siup_usaha" class="form-control" placeholder="" value="{{$pelaku->siup_usaha}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Mulai Usaha <span class="text-danger">*</span></label>
                      <input type="date" name="mulai_usaha" id="mulai_usaha" class="form-control" placeholder="" value="{{$pelaku->mulai_usaha}}">
                    </div>
                    
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-label" for="">Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" id="deskripsi">{{$pelaku->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Keahlian</label>
                      <textarea class="form-control" name="keahlian" id="keahlian">{{$pelaku->keahlian}}</textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Pengalaman</label>
                      <textarea class="form-control" name="pengalaman" id="pengalaman">{{$pelaku->pengalaman}}</textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Portofolio</label>
                      <textarea class="form-control" name="portofolio" id="portofolio">{{$pelaku->portofolio}}</textarea>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success btn-block">Update</button>
                  </form>
                </div>
                  
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                <form action="/pengguna/kontak-usaha/update" method="post">
                  @csrf
                  <input type="hidden" name="kode_pelaku_ekraf" value="{{$pelaku->kode_pelaku_ekraf}}">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label" for="">Alamat</label>
                      <input type="text" name="alamat_usaha" id="alamat_usaha" class="form-control" placeholder="Alamat" value="{{$pelaku->alamat_usaha}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Kode Pos</label>
                      <input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="Kode Pos" value="{{$pelaku->kode_pos}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Email Usaha</label>
                      <input type="email" name="email_usaha" id="email_usaha" class="form-control" placeholder="Email Usaha" value="{{$pelaku->email_usaha}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Telepon</label>
                      <input type="text" name="telepon_usaha" id="telepon_usaha" class="form-control" placeholder="Telepon" value="{{$pelaku->telepon_usaha}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label" for="">Facebook</label>
                      <input type="text" name="facebook_usaha" id="facebook_usaha" class="form-control" placeholder="" value="{{$pelaku->facebook_usaha}}">
                      
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Twitter</label>
                      <input type="text" name="twitter_usaha" id="twitter_usaha" class="form-control" placeholder="" value="{{$pelaku->twitter_usaha}}">
                      
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Instagram</label>
                      <input type="text" name="ig_usaha" id="ig_usaha" class="form-control" placeholder="" value="{{$pelaku->ig_usaha}}">
                      
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Website</label>
                      <input type="text" name="web_usaha" id="web_usaha" class="form-control" placeholder="Website" value="{{$pelaku->web_usaha}}">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Update</button>
                </form>  
                  
              </div>
              <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                <form action="/pengguna/kontak-pemilik/update" method="post" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="kode_pelaku_ekraf" value="{{$pelaku->kode_pelaku_ekraf}}">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label" for="">Foto Pemilik</label><br>
                      @if($pelaku->foto_pemilik != Null)
                      <img class="profile-user-img img-fluid img-circle" src="{{asset('images/foto_pemilik/thumb/'.$pelaku->foto_pemilik)}}" alt="User profile picture">
                      @else
                      <img class="profile-user-img img-fluid img-circle" src="{{asset('images/foto_pemilik/default.png')}}" alt="User profile picture">
                      @endif
                      <input type="file" name="foto_pemilik" id="foto_pemilik" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Nama Pemilik</label>
                      <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control" placeholder="Nama Pemilik" value="{{$pelaku->nama_pemilik}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">NIK Pemilik</label>
                      <input type="text" name="nik_pemilik" id="nik_pemilik" class="form-control" placeholder="NIK" value="{{$pelaku->nik_pemilik}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Email</label>
                      <input type="text" name="email_pemilik" id="email_pemilik" class="form-control" placeholder="Email" value="{{$pelaku->email_pemilik}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">No. HP/WA</label>
                      <input type="text" name="wa_pemilik" id="wa_pemilik" class="form-control" placeholder="No. HP/WA" value="{{$pelaku->wa_pemilik}}">
                    </div>
                    
                    <div class="form-group">
                      <label class="form-label" for="">Website</label>
                      <input type="text" name="web_pemilik" id="web_pemilik" class="form-control" placeholder="Website" value="{{$pelaku->web_pemilik}}">
                    </div>
                    
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-label" for="">Facebook</label>
                      <input type="text" name="fb_pemilik" id="fb_pemilik" class="form-control" placeholder="Facebook" value="{{$pelaku->fb_pemilik}}">
                      
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Twitter</label>
                      <input type="text" name="twitter_pemilik" id="twitter_pemilik" class="form-control" placeholder="Twitter" value="{{$pelaku->twitter_pemilik}}">
                     
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Instagram</label>
                      <input type="text" name="ig_pemilik" id="ig_pemilik" class="form-control" placeholder="Instagram" value="{{$pelaku->ig_pemilik}}">
                      
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Website</label>
                      <input type="text" name="web_pemilik" id="web_pemilik" class="form-control" placeholder="Website" value="{{$pelaku->web_pemilik}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">LinkedIn</label>
                      <input type="text" name="linkedin_pemilik" id="linkedin_pemilik" class="form-control" placeholder="LinkedIn" value="{{$pelaku->linkedin_pemilik}}">
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="">Telegram</label>
                      <input type="text" name="telegram_pemilik" id="telegram_pemilik" class="form-control" placeholder="Telegram" value="{{$pelaku->telegram_pemilik}}">
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-block">Update</button>
                </form>   
                  
                  
              </div>
              
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>



@endsection
@section('footer')
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('mask_plugin/dist/jquery.mask.min.js')}}"></script>
<script>
$(document).ready(function(){
    $('#deskripsi').summernote();
    $('#keahlian').summernote();
    $('#pengalaman').summernote();
    $('#portofolio').summernote();
    $('#wa_pemilik').mask('+62 0000 0000 00000');
    
});
</script>
<script>
  function readURL(input) { // Mulai membaca inputan gambar
    if (input.files && input.files[0]) {
      var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
      reader.onload = function (e) { // Mulai pembacaan file
        $('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
        .attr('src', e.target.result)
  //.height(500); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
};

reader.readAsDataURL(input.files[0]);
}
}
</script>
@stop