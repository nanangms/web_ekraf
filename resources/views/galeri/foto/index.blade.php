@extends('layouts.app')

@section('title')
Foto : {{$album->nama_album}}
@endsection
@section('header')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Galeri Foto dari Album : <strong>{{$album->nama_album}}</strong></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Foto</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tambah Foto</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <form action="/galeri/foto/create/{{$album->id}}" class="form-horizontal" method="post" enctype="multipart/form-data">
              {{csrf_field()}}

              <div class="row">
                <div class="col-md-12">
                  <div class=" form-group row">
                    <div class="col-md-12">
                      <label>Foto<span class="text-danger">*</span></label>
                      <input type="file" class="form-control" name="gambar" onchange="readURL(this);" required />
                      @if($errors->has('gambar'))
                      <span class="text-danger">{{$errors->first('gambar')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class=" form-group row">
                    <div class="col-md-12">
                      <label>Keterangan foto (opsional)</label>
                      <input type="text" class="form-control" name="keterangan" />
                    </div>
                  </div>
                  <div class=" form-group row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <img id="preview_gambar" src="" style="height: 100%; width: auto;" />
        </div>
        
      </div>
    </div>

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Data Foto</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>

        </div>
      </div>
      <div class="card-body">
        <p align="right">
        </p>
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Foto</th>
              <th>Keterangan Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

@include('layouts._modal')
@endsection
@section('footer')
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>

<script src="{{ asset('crud/app.js') }}"></script>
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
 $(document).ready( function () {
  $('#datatable').DataTable({
    responsive: true,
    processing: true,
    serverSide: true,
    autoWidth: false,
    lengthChange: false,
    ajax: "/table/foto/<?=$album->id?>",
    columns: [
    {data: 'DT_RowIndex', name: 'id'},
    {data: 'gambar'},
    {data: 'keterangan'},
    {data: 'action', name: 'action'}
    ]
  });
});

 $('body').on('click', '.hapus', function (event) {
  event.preventDefault();

  var foto_id = $(this).attr('foto-id');
  swal({
    title: "Anda Yakin?",
    text: "Mau Menghapus Foto ?",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((result) => {
    if (result) {
      $.ajax({
        url: "/galeri/foto/"+foto_id+"/delete",

        success: function (response) {
          $('#datatable').DataTable().ajax.reload();
          swal("Berhasil", "Data Berhasil Dihapus", "success");
        },
        error: function (xhr) {
          swal("Oops...", "Terjadi Kesalahan", "error");

        }
      });
    }
  });
});
</script>

@stop

