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
                        <form action="/berita/{{$berita->uuid}}/update" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Judul <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="judul" value="{{$berita->judul}}"/>
                                    </div>

                                    <div class=" form-group">
                                        <label class="control-label">Isi <span class="text-danger">*</span></label>
                                        <textarea name="isi">{{$berita->isi}}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gambar <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" name="gambar" onchange="readURL(this);"/>
                                        @if($errors->has('gambar'))
                                        <span class="help-block">{{$errors->first('gambar')}}</span>
                                        @endif
                                        @if($berita->gambar)
                                        <div class="card mt-2" style="overflow: hidden">
                                            <img id="preview_gambar" src="/images/berita/{{$berita->gambar}}" style="width: 100%; height: auto;" />
                                        </div>
                                        @else
                                        <small style="color: red">Belum ada gambar yang diupload</small>
                                        @endif
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label>Kategori<span class="text-danger">*</span></label>
                                            <select name="kategori_id" class="form-control select" required>
                                                <option value="">--Pilih--</option>
                                                <?php $kategori = \App\Models\Kategori::all(); ?>
                                                @foreach($kategori as $listkategori)
                                                <option value="{{$listkategori->id}}" @if($listkategori->id == $berita->kategori_id) selected @endif>{{$listkategori->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <label>Tag<span class="text-danger">*</span></label>
                                            <?php $tag = \App\Models\Tag::all(); 
                                            $berita_tag = explode(",", $berita->tag); ?>
                                            @foreach ($tag as $t)
                                            <div class="form-check">
                                                <?php $_ck = (array_search($t->nama_tag, $berita_tag) === false)? '' : 'checked';
                                                echo "<span style='display:inline-block;'><input class=form-check-input type=checkbox value='$t->nama_tag' name=tag[] $_ck> $t->nama_tag &nbsp; &nbsp; &nbsp; </span>"; ?>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Publish <span class="text-danger">*</span></label><br>
                                        @if($berita->published == 'Y')
                                        <input type='radio' name='published' value='Y' required checked> Ya &nbsp; <input type='radio' name='published' value='N'> Tidak</td>
                                        @else
                                        <input type='radio' name='published' value='Y' required> Ya &nbsp; <input type='radio' name='published' value='N' checked> Tidak</td>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </form> 
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