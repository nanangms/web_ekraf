@extends('layouts.app')
@section('title')
Edit Produk
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
                            <form action="/pengguna/produk-usaha/update/{{$produk->uuid}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label class="form-label" for="">Nama Produk</label>
                                  <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Nama Produk" value="{{$produk->nama_produk}}">
                                </div>
                                <div class="form-group">
                                  <label class="form-label" for="">Deskripsi</label>
                                  <textarea class="form-control" name="deskripsi">{{$produk->deskripsi}}</textarea>
                                </div>
                                <div class="form-group">
                                  <label class="form-label" for="">Harga</label>
                                  <input type="text" name="harga" id="harga" class="form-control" placeholder="Nama Produk" value="{{$produk->harga}}">
                                </div>
                                <div class="form-group">
                                  <label class="form-label" for="">Gambar Produk</label><br>
                                  @if($produk->gambar != Null)
                                    <img src="{{asset('images/produk/thumb/'.$produk->gambar)}}" width="100px">
                                  @else
                                    <img src="{{asset('images/no_ekraf.jpg')}}">
                                  @endif
                                  <input type="file" name="gambar" id="gambar" class="form-control">
                                  <span class="text-danger"><i>Kosongkan jika tidak diganti</i></span>
                                </div>
                                <div class="form-group">
                                  <label class=""></label>
                                  <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
@stop