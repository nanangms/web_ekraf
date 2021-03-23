@extends('layouts.app')

@section('title')
Produk
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
          <h1>Data Produk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Data Produk</li>
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
        <h3 class="card-title">Data Produk</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <table id="datatable" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Gambar</th>
              <th>Nama Usaha</th>
              <th>Nama Produk</th>
              <th>Harga</th>
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

<!-- /.modal -->
<div class="modal fade" id="ShowProduk">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail Produk</h4>
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
  </div>
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
  $(document).ready( function () {
    $('#datatable').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      autoWidth: false,
      lengthChange: false,
      ajax: "{{ route('table.produk') }}",
      columns: [
      {data: 'DT_RowIndex', name: 'id'},
      {data: 'gambar'},
      {data: 'nama_usaha'},
      {data: 'nama_produk'},
      {data: 'harga'},
      {data: 'action', name: 'action'}
      ]
    });

    $('body').on('click', '.hapus', function (event) {
      event.preventDefault();

      var produk_name = $(this).attr('produk-name'),
      title = produk_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
      produk_id = $(this).attr('produk-id');
      swal({
        title: "Anda Yakin?",
        text: "Mau Menghapus Data : "+ title +"?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((result) => {
        if (result) {
          $.ajax({
            url: "/produk/"+produk_id+"/delete",

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
    $("#ShowProduk").on("show.bs.modal", function(e) {
      var id = $(e.relatedTarget).data('target-id');

      $.ajax({
        url: "/produk" +'/' + id +'/detail',
        dataType: 'html',
        success: function (response) {
          $('.isi').html(response);
        }
      });

    });
    
  });
</script>

@stop

