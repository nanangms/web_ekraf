@extends('layouts.app')

@section('title')
Detail Pelaku Ekraf
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
            <a href="/pelaku_ekraf" class="btn btn-info"><i class="fa fa-arrow-left"></i> Kembali</a>
          <h1>Pelaku Ekraf : {{$pelaku->nama_usaha}}</h1>
          
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item active">Detail Pelaku Ekraf</li>
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
            <h3 class="card-title">Detail Pelaku Ekraf</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
        <div class="card-body">
            <p>Status Member : <span class="badge badge-danger">{{$pelaku->member}}</span></p>
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Identitas Usaha</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Identitas Pemilik Usaha</a>
                  </li>
                  
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade " id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                     <table class="table table-bordered table-hover">
                         <tr>
                             <td width="20%"><strong>Footo/Nama</strong></td>
                             <td width="2%" align="center">:</td>
                             <td>
                                @if($pelaku->foto_pemilik != Null)
                                <img src="{{asset('images/foto_pemilik/thumb/'.$pelaku->foto_pemilik) }}" class="img-circle elevation-2" alt="User Image" style="object-fit: cover; position: relative; width: 150px; height: 150px; overflow: hidden;">
                                
                            @else
                            <img src="{{asset('images/foto_pemilik/default-dark.png') }}" class="img-circle elevation-2" alt="User Image" style="object-fit: cover; position: relative; width: 150px; height: 150px; overflow: hidden;">
                               
                            @endif
                                {{$pelaku->nama_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>NIK/Nomor Identitas</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->nik_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>No. Hp</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->wa_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>Email</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->email_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>Whatsapp</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->wa_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>Facebook</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->fb_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>Twitter</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->twitter_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>Instagram</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->ig_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>LinkedIn</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->linkedin_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>Telegram</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->telegram_pemilik}}</td>
                         </tr>
                         <tr>
                             <td><strong>Website</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->web_pemilik}}</td>
                         </tr>
                         
                     </table>
                  </div>
                  <div class="tab-pane fade show active" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <td colspan="3"><center>
                          @if($pelaku->foto_usaha == Null)
                          <img src="{{asset('images/default_gbr_usaha.jpg')}}">
                          @else
                          <img src="{{asset('images/foto_usaha/'.$pelaku->foto_usaha)}}" width="50%">
                          @endif
                        </center></td>
                        </tr>
                         <tr>
                             <td width="20%"><strong>Nama Usaha</strong></td>
                             <td width="2%" align="center">:</td>
                             <td>{{$pelaku->nama_usaha}}</td>
                         </tr>
                         <tr>
                             <td width="20%"><strong>SIUP Usaha</strong></td>
                             <td width="2%" align="center">:</td>
                             <td>{{$pelaku->siup_usaha}}</td>
                         </tr>
                         <tr>
                             <td><strong>Kabupaten/Kota</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->nama_kab_kota}}</td>
                         </tr>
                         <tr>
                             <td><strong>Sektor</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->nama_sektor}}</td>
                         </tr>
                         <tr>
                             <td><strong>Mulai Usaha</strong></td>
                             <td align="center">:</td>
                             <td>{{TanggalAja($pelaku->mulai_usaha)}}</td>
                         </tr>
                         
                         <tr>
                             <td><strong>Badan Hukum</strong></td>
                             <td align="center">:</td>
                             <td>{{$pelaku->nama_badan_hukum}}</td>
                         </tr>
                         <tr>
                             <td><strong>Kontak Usaha</strong></td>
                             <td align="center">:</td>
                             <td>Email : {{$pelaku->email_usaha}}<br>
                                No. Hp : {{$pelaku->telepon_usaha}}<br>
                                Alamat : {{$pelaku->alamat_usaha}}<br>
                                Kode Pos : {{$pelaku->kode_pos}}<br>
                             </td>
                         </tr>
                         <tr>
                             <td><strong>Sosial Media</strong></td>
                             <td align="center">:</td>
                             <td>Facebook : {{$pelaku->facebook_usaha}}<br>
                                Instagram : {{$pelaku->ig_usaha}}<br>
                                Twitter : {{$pelaku->twitter_usaha}}<br>
                                Website : {{$pelaku->web_usaha}}<br>

                             </td>
                         </tr>
                        <tr>
                             <td><strong>Deskripsi</strong></td>
                             <td align="center">:</td>
                             <td>{!!$pelaku->deskripsi!!}</td>
                         </tr>
                         <tr>
                             <td><strong>Keahlian</strong></td>
                             <td align="center">:</td>
                             <td>{!!$pelaku->keahlian!!}</td>
                         </tr>
                         <tr>
                             <td><strong>Pengalaman</strong></td>
                             <td align="center">:</td>
                             <td>{!!$pelaku->pengalaman!!}</td>
                         </tr>
                         <tr>
                             <td><strong>Portofolio</strong></td>
                             <td align="center">:</td>
                             <td>{!!$pelaku->portofolio!!}</td>
                         </tr>

                        
                     </table>
                    
                  </div>
                  
                </div>
              </div>
            </div>
        </div>
    </div>
  </section>
</div>
@endsection