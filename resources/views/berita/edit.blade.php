@extends('layouts.app')
@section('title')
Edit Berita
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@yield('title')</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                      <li class="breadcrumb-item active">@yield('title')</li>
                  </ol>
              </div>
          </div>
      </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="/berita/{{$berita->id}}/update" class="form-horizontal" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class=" form-group row">
                                <div class="col-md-12">
                                    <label class="control-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" value="{{$berita->judul}}"/>
                                </div>
                            </div>

                            <div class=" form-group row">
                                <div class="col-md-12">
                                    <label class="control-label">Isi</label>
                                    <textarea name="isi">{{$berita->isi}}</textarea>
                                </div>
                            </div>

                            <div class=" form-group row">
                                <div class="col-md-12">
                                    <label>Gambar</label>
                                    <input type="file" class="form-control" name="gambar" onchange="readURL(this);"/>
                                    @if($errors->has('gambar'))
                                    <span class="help-block">{{$errors->first('gambar')}}</span>
                                    @endif
                                    @if($berita->gambar)
                                    <img id="preview_gambar" style="margin-top:15px;max-width:100px;" src="/images/berita/{{$berita->gambar}}">
                                    @else
                                    <small style="color: red">Belum ada gambar yang diupload</small>
                                    @endif
                                </div>
                            </div>

                            <div class=" form-group row">
                                <div class="col-md-12">
                                    <label>Publish</label><br>
                                    @if($berita->published == 'Y')
                                    <input type='radio' name='published' value='Y' required checked> Ya &nbsp; <input type='radio' name='published' value='N'> Tidak</td>
                                    @else
                                    <input type='radio' name='published' value='Y' required> Ya &nbsp; <input type='radio' name='published' value='N' checked> Tidak</td>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
<script src="{{asset('admin/global_assets/js/demo_pages/form_multiselect.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/notifications/pnotify.min.js')}}"></script>
<script src="{{asset('admin/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>

<script src="//cdn.ckeditor.com/4.14.1/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('isi');
</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('sukses'))
<script type="text/javascript">
    swal("Berhasil", "{{session('sukses')}}", "success");
</script>
@endif
@if(session('hapus'))
<script type="text/javascript">
    swal("Berhasil", "{{session('hapus')}}", "success");
</script>
@endif
<script>
  function readURL(input) { // Mulai membaca inputan gambar
    if (input.files && input.files[0]) {
      var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
      reader.onload = function (e) { // Mulai pembacaan file
        $('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
        .attr('src', e.target.result)
        .width(100); // Menentukan lebar gambar preview (dalam pixel)
  //.height(200); // Jika ingin menentukan lebar gambar silahkan aktifkan perintah pada baris ini
};

reader.readAsDataURL(input.files[0]);
}
}
</script>
@stop