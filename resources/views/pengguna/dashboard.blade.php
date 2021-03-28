@extends('layouts.app')

@section('title')
Dashboard
@endsection
@section('header')
<!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/pengguna/dashboard">Dashboard</a></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informasi Akun</h3>
              </div>
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{auth()->user()->getAvatarProfil()}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{auth()->user()->name}}</h3>

                <p class="text-muted text-center">{{auth()->user()->email}}</p>

                <a href="/profil/{{auth()->user()->uuid}}" class="btn btn-primary btn-block"><i class="fa fa-edit"></i><b>Edit Akun</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Informasi Pemilik Usaha</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Nama</strong>

                <p class="text-muted">
                  {{$pelaku->nama_pemilik}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> NIK</strong>

                <p class="text-muted">{{$pelaku->nik_pemilik}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>

                <p class="text-muted">
                  {{$pelaku->email_pemilik}}
                </p>

                <hr>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>WA</b> <a class="float-right">{{$pelaku->wa_pemilik}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Facebook</b> <a class="float-right">{{$pelaku->fb_pemilik}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Twitter</b> <a class="float-right">{{$pelaku->twitter_pemilik}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Instagram</b> <a class="float-right">{{$pelaku->ig_pemilik}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>LinkedIn</b> <a class="float-right">{{$pelaku->linkedin_pemilik}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Telegram</b> <a class="float-right">{{$pelaku->telegram_pemilik}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Website</b> <a class="float-right">{{$pelaku->web_pemilik}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Profil Usaha</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Produk</a></li>
                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <table class="table table-bordered table-hover">
                      <tr>
                        <td colspan="3">
                          <center>
                  @if($pelaku->foto_usaha == Null)
                  <img src="{{asset('images/default_gbr_usaha.jpg')}}">
                  @else
                  <img src="{{asset('images/foto_usaha/'.$pelaku->foto_usaha)}}" width="50%">
                  @endif
                </center>
                        </td>
                      </tr>
                       <tr>
                           <td width="40%"><strong>Nama Usaha</strong></td>
                           <td width="5%">:</td>
                           <td width="55">{{$pelaku->nama_usaha}}</td>
                       </tr>
                       <tr>
                           <td><strong>Sektor</strong></td>
                           <td>:</td>
                           <td>{{$pelaku->nama_sektor}}</td>
                       </tr>
                       <tr>
                           <td><strong>Mulai Usaha</strong></td>
                           <td>:</td>
                           <td>{{TanggalAja($pelaku->mulai_usaha)}}</td>
                       </tr>
                   
                       <tr>
                           <td><strong>Alamat Usaha</strong></td>
                           <td>:</td>
                           <td>{{$pelaku->alamat_usaha}}</td>
                       </tr>
                       
                       <tr>
                           <td><strong>Badan Hukum</strong></td>
                           <td>:</td>
                           <td>{{$pelaku->nama_badan_hukum}}</td>
                       </tr>
                    </table>
                    <p><strong>Deskripsi</strong></p>
                    {!! $pelaku->deskripsi !!}
                    <hr>
                    <p><strong>Keahlian</strong></p>
                    {!! $pelaku->keahlian !!}
                    <hr>
                    <p><strong>Pengalaman</strong></p>
                    {!! $pelaku->pengalaman !!}
                    <hr>
                    <p><strong>Portofolio</strong></p>
                    {!! $pelaku->portofolio !!}
                    <hr>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    timeline
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



@endsection
@section('footer')
<!-- DataTables  & Plugins -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>


    
@stop