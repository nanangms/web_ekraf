@extends('layouts.app')

@section('title')
Sub Menu : {{$menu->nama_menu}}
@endsection
@section('header')
<!-- DataTables -->
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
          <h1>Sub Menu dari Menu : <strong>{{$menu->nama_menu}}</strong></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/setting/menu">Menu</a></li>
            <li class="breadcrumb-item active">Sub Menu</li>
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
        <h3 class="card-title">Data Sub Menu</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <p align="right">
            <button data-toggle="modal" data-target="#ShowTambah" class="btn btn-info" title="Tambah"><i class="fa fa-plus"></i> Tambah Sub Menu</button>
        </p>
        <table id="datatable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Sub Menu</th>
                    <th>Urutan</th>
                    <th>Url</th>
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

<!-- MODAL Tambah  -->      
<div class="modal fade" id="ShowTambah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Sub Menu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <form action="/setting/submenu/tambah" method="post">
            @csrf
            <input type="hidden" name="id_menu" value="{{$id_menu}}" class="form-control">
            <div class="form-group">
                <label>Nama Menu</label>
                <input type="text" name="nama_menu" value="" class="form-control">
            </div>

            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" value="" class="form-control">
                
            </div>
            
            <div class="form-group">
                <label>Icon</label>
                <input type="text" name="icon" value="" class="form-control">

            </div>
            <div class="form-group">
                <label>Urutan</label>
                <input type="number" name="urutan" value="" class="form-control">

            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> SIMPAN</button>

            </div>
            </form>
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

<!-- MODAL EDIT  -->      
<div class="modal fade" id="ShowEDIT">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data Sub Menu</h4>
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
    var id ='{{$id_menu}}';
    $(document).ready( function () {

    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ url('setting/submenu/datatable') }}/"+id,
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama_menu', name: 'nama_menu'},
            {data: 'urutan', name: 'urutan'},
            {data: 'url', name: 'url'},
            {data: 'action', name: 'action'}
        ]
    });
    //Edit
    $("#ShowEDIT").on("show.bs.modal", function(e) {
        var id = $(e.relatedTarget).data('target-id');
        $.ajax({
            url: "/setting" +'/submenu/edit/'+id,
            dataType: 'html',
            success: function (response) {
                $('.isi').html(response);
            }
        });

    });
    //Hapus
    $('body').on('click', '.hapus', function (event) {
        event.preventDefault();

        var submenu_name = $(this).attr('submenu-name'),
            title = submenu_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
            submenu_id = $(this).attr('submenu-id');
        swal({
            title: "Anda Yakin?",
            text: "Mau Menghapus Data : "+ title +"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((result) => {
            if (result) {
                $.ajax({
                    url: "/setting/submenu/"+submenu_id+"/delete",

                    success: function (response) {
                        $('#datatable').DataTable().ajax.reload();
                        swal({
                            type: "success",
                            icon: "success",
                            title: "BERHASIL!",
                            text: "Data Submenu Berhasil Dihapus",
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
    });
</script>
@stop
