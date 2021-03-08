@extends('layouts.app')

@section('title')
Berita
@endsection
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Table datatable css -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Berita</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Berita</li>
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
        <h3 class="card-title">Berita</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
        </button>

    </div>
</div>
<div class="card-body">
    <p align="right">
        <button data-toggle="modal" data-target="#ShowTambah" class="btn btn-info" title="Tambah"><i class="fa fa-plus"></i> Tambah Berita</button>
    </p>
    <table id="datatable" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Publish</th>
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
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        order: [ [0,'desc']],
        ajax: "{{ route('table.berita') }}",
        columns: [
        {data: 'DT_RowIndex', name: 'id'},
        {data: 'gambar', name: 'gambar'},
        {data: 'judul', name: 'judul'},
        {data: 'tgl_publish', name: 'tgl_publish'},
        {data: 'published', name: 'published'},
        {data: 'action', name: 'action'}
        ]
    });

    $('body').on('click', '.hapus', function (event) {
        event.preventDefault();

        var judul = $(this).attr('berita-name'),
        berita_id = $(this).attr('berita-id');
        swal({
            title: "Anda Yakin?",
            text: "Mau Menghapus Data : "+ judul +"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((result) => {
            if (result) {
                $.ajax({
                    url: "/berita/"+berita_id+"/delete",

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