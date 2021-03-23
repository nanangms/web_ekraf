@extends('layouts.app')

@section('title')
Event
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
          <h1>Data Event</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Event</li>
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
        <h3 class="card-title">Data Event</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <p align="right">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Tambah"><i class="fa fa-plus"></i> Tambah Data</button>
        </p>
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Banner</th>
              <th>Nama Event</th>
              <th>Tanggal Event</th>
              <th>Lokasi</th>
              <th>Aktif</th>
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

@include('event.tambah')

<!-- MODAL EDIT  -->      
<div class="modal fade" id="ShowEDIT">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Event</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <div class="isi"></div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

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
      ajax: "{{ route('table.event') }}",
      columns: [
      {data: 'DT_RowIndex', name: 'id'},
      {data: 'foto_banner'},
      {data: 'nama_event'},
      {data: 'tgl_event'},
      {data: 'lokasi'},
      {data: 'publish'},
      {data: 'action', name: 'action'}
      ]
    });
  });

  //Hapus
    $('body').on('click', '.hapus', function (event) {
        event.preventDefault();

        var event_name = $(this).attr('event-name'),
            title = event_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            event_id = $(this).attr('event-id');
        swal({
            title: "Anda Yakin?",
            text: "Mau Menghapus Data : "+ title +"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "/event/"+event_id+"/delete",

                    success: function (response) {
                        $('#datatable').DataTable().ajax.reload();
                        swal({
                            type: "success",
                            icon: "success",
                            title: "BERHASIL!",
                            text: "Data Berhasil Dihapus",
                            timer: 1500,
                            showConfirmButton: false,
                            showCancelButton: false,
                            buttons: false,
                        });
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

