@extends('layouts.app')

@section('title')
Produk Usaha
@endsection
@section('header')
<!-- DataTables -->
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
          <h1>Produk Usaha</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/pengguna/dashboard">Produk Usaha</a></li>
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
        <h3 class="card-title">Produk Usaha</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <p align="right">
            <button data-toggle="modal" data-target="#ShowTambah" class="btn btn-info" title="Tambah"><i class="fa fa-plus"></i> Tambah Produk</button>
        </p>
        <table id="datatable" class="table table-bordered">
          <thead>
          <tr>
              <th scope="col" style="text-align: center;width: 6%">NO.</th>
              <th scope="col">Gambar</th>
              <th scope="col">Nama Produk</th>
              <th scope="col">Deskripsi</th>
              <th scope="col">Harga</th>
              <th scope="col" style="width: 15%;text-align: center">AKSI</th>
          </tr>
          </thead>
          <tbody>
          
          </tbody>
      </table>
      
      </div>
    </div>
  </section>
</div>
<!-- MODAL Tambah  -->      
<div class="modal fade" id="ShowTambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <form action="/pengguna/produk-usaha/tambah" class="form-horizontal" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="form-label" for="">Nama Produk</label>
              <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Nama Produk" value="{{old('nama_produk')}}">
            </div>
            <div class="form-group">
              <label class="form-label" for="">Deskripsi</label>
              <textarea class="form-control" name="deskripsi">{{old('deskripsi')}}</textarea>
            </div>
            <div class="form-group">
              <label class="form-label" for="">Harga</label>
              <input type="text" name="harga" id="harga" class="form-control" placeholder="Nama Produk" value="{{old('harga')}}">
            </div>
            <div class="form-group">
              <label class="form-label" for="">Gambar Produk</label>
              <input type="file" name="gambar" id="gambar" class="form-control">
            </div>
            
            <div class="form-group">
              <label class=""></label>
              <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script>
  $(document).ready( function () {
    var id ='{{Auth::user()->kode_pelaku_ekraf}}';
    $('#datatable').DataTable({
      responsive: true,
      processing: true,
      serverSide: true,
      autoWidth: false,
      ajax: "{{ url('pengguna/produk-usaha/datatable') }}/"+id,
      columns: [
        {data: 'DT_RowIndex', name: 'id'},
        {data: 'gambar'},
        {data: 'nama_produk'},
        {data: 'deskripsi'},
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
            url: "/pengguna/produk-usaha/"+produk_id+"/delete",

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