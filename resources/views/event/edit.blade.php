@extends('layouts.app')

@section('title')
Edit Event
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
          <h1>@yield('title')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">@yield('title')</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">@yield('title')</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse" >
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <form action="/event/{{$event->uuid}}/update" class="form-horizontal" method="POST" enctype="multipart/form-data">
          {{csrf_field()}}

          <div class=" form-group row">
            <div class="col-md-12">
              <label>Nama Event</label>
              <input type="text" class="form-control" name="nama_event" value="{{$event->nama_event}}" />
            </div>
          </div>

          <div class=" form-group row">
            <div class="col-md-12">
              <label>Tanggal Event</label>
              <input type="date" class="form-control" name="tgl_event" value="{{$event->tgl_event}}"/>
            </div>
          </div>

          <div class=" form-group row">
            <div class="col-md-12">
              <label>Lokasi</label>
              <input type="text" class="form-control" name="lokasi" value="{{$event->lokasi}}"/>
            </div>
          </div>

          <div class=" form-group row">
            <div class="col-md-12">
              <label>Foto Banner</label>
              <div class="row">
                <div class="col-md-12">
                  <input type="file" class="form-control" name="foto_banner" onchange="readURL(this);" >
                  @if($event->foto_banner)
                  <div class="card mt-2" style="overflow: hidden">
                    <img id="preview_gambar" src="/images/event/{{$event->foto_banner}}" style="width: 100px; height: auto;" />
                  </div>
                  @else
                  <small style="color: red">Belum ada gambar yang diupload</small>
                  @endif
                </div>
                <div class="col-md-6">
                  <img id="preview_gambar" src="" style="width: 100px;" />
                </div>
              </div>
              @if($errors->has('foto_banner'))
              <span class="text-danger">{{$errors->first('foto_banner')}}</span>
              @endif
            </div>
          </div>
          <div class=" form-group row">
            <div class="col-md-12">
              <label>Deskripsi</label>
              <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{$event->deskripsi}}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <label>Publish<span class="text-danger">*</span></label><br>
              @if($event->published == 'Y')
              <input type='radio' name='published' value='Y' required checked> Ya &nbsp; <input type='radio' name='published' value='N'> Tidak</td>
              @else
              <input type='radio' name='published' value='Y' required> Ya &nbsp; <input type='radio' name='published' value='N' checked> Tidak</td>
              @endif                                 
            </div>
          </div>

          <div class="form-group row">
            <div class="col-lg-12">
             <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
           </div>
         </div>
       </form>
       
     </div>
   </div>
 </section>
</div>


@endsection
@section('footer')

<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  function readURL(input) { // Mulai membaca inputan gambar
    if (input.files && input.files[0]) {
      var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
      reader.onload = function (e) { // Mulai pembacaan file
        $('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
        .attr('src', e.target.result)
  //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
};

reader.readAsDataURL(input.files[0]);
}
}
</script>
<script>
  $(document).ready(function(){
    $('#deskripsi').summernote()
  });
</script>


@stop