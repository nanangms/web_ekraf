@extends('layouts.app')

@section('title')
User
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
          <h1>User</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">User</li>
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
        <h3 class="card-title">User</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          
        </div>
      </div>
      <div class="card-body">
        <p align="right">
            <button data-toggle="modal" data-target="#ShowTambah" class="btn btn-info" title="Tambah"><i class="fa fa-plus"></i> Tambah User</button>
        </p>
        <table id="datatable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Hak Akses</th>
                    <th>Status</th>      
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
          <h4 class="modal-title">Tambah User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal-body">
          <form action="/user/tambah" class="form-horizontal" method="POST" id="tambah-user">
                @csrf
                <div class="form-group row">
                    <label class="label-text col-lg-3 col-form-label text-md-right">Nama</label>
                    <div class="col-lg-9">
                        <input type="text" name="name" id="name" value="{{old('name')}}" placeholder="" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="label-text col-lg-3 col-form-label text-md-right">Email</label>
                    <div class="col-lg-9">
                        <input type="email" name="email" id="email" value="{{old('email')}}" placeholder="" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="label-text col-lg-3 col-form-label text-md-right">Password</label>
                    <div class="col-lg-9">
                        <input type="password" id="password" name="password" value="{{old('password')}}" placeholder="" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="label-text col-lg-3 col-form-label text-md-right">Hak Akses</label>
                    <div class="col-lg-9">
                        <select name="role_id" class="form-control" id="role_id">
                        <option value="">--Pilih--</option>
                        @foreach($role as $list)
                            <option value="{{$list->id}}" {{(old('role_id') == $list->id ) ? ' selected' : ''}}>{{$list->nama_role}}</option>
                        @endforeach
                           
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="label-text col-lg-3 col-form-label text-md-right">Status</label>
                    <div class="col-lg-9">
                        <select name="is_active" class="form-control" id="is_active">
                            <option value="">--Pilih--</option>
                            <option value="Y" {{(old('status') =='Y' ) ? ' selected' : ''}}>Aktif</option>
                            <option value="N" {{(old('status') == 'N' ) ? ' selected' : ''}}>Non Aktif</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label class="label-text col-lg-3 col-form-label text-md-right"></label>
                    <div class="col-lg-9">
                       <button id="modal-btn-save" type="button" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
                    </div>
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
<div class="modal fade" id="ShowEDIT">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Data User</h4>
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
  $(document).ready( function () {
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        autoWidth: false,
        ajax: "{{ route('table.user') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'jml_submenu'},
            {data: 'nama_role', name: 'nama_role'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action'}
        ]
    });

    $('#modal-btn-save').click(function (event) {
        event.preventDefault();

        var form = $('#modal-body form'),
            url = form.attr('action');

         form.find('.text-danger').remove();

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                form.trigger('reset');
                $('#ShowTambah').modal('hide.bs.modal');
                $('#datatable').DataTable().ajax.reload();

                swal("Berhasil", "Data Berhasil Disimpan", "success");
            },

            error: function (err) {
                if (err.status == 422){
                    console.log(err.responseJSON);

                    console.warn(err.responseJSON.errors);
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="'+i+'"]');
                        el.after($('<span class="text-danger">'+error[0]+'</span>'));
                    });
                }
            }
        })
    });

    $('body').on('click', '.hapus', function (event) {
    event.preventDefault();

    var user_name = $(this).attr('user-name'),
        title = user_name.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toUpperCase();});
        user_id = $(this).attr('user-id');
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
                url: "/user/"+user_id+"/delete",

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
    $("#ShowEDIT").on("show.bs.modal", function(e) {
            var id = $(e.relatedTarget).data('target-id');

            $.ajax({
                url: "/user" +'/' + id +'/edit',
                dataType: 'html',
                success: function (response) {
                    $('.isi').html(response);
                }
            });

        });
        
  });
</script>
@stop
