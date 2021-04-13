<div class="row">
  <div class="col-md-12 col-sm-6">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">
        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Identitas Pelaku Ekraf</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Identitas Usaha</a>
          </li>
        </ul>
      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
          <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
             <table class="table table-bordered table-hover">
                 <tr>
                     <td width="30%"><strong>Nama</strong></td>
                     <td width="5%">:</td>
                     <td width="65">{{$pendaftaran->nama_lengkap}}</td>
                 </tr>
                 <tr>
                     <td><strong>NIK/Nomor Identitas</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->no_ktp}}</td>
                 </tr>
                 <tr>
                     <td><strong>Alamat Domisili</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->alamat_domisili}}</td>
                 </tr>
                 <tr>
                     <td><strong>No. Hp</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->no_hp}}</td>
                 </tr>
                 <tr>
                     <td><strong>Email</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->email}}</td>
                 </tr>
                 <tr>
                     <td><strong>Kabupaten/Kota</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->nama_kab_kota}}</td>
                 </tr>
                 <tr>
                     <td><strong>Sektor</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->nama_sektor}}</td>
                 </tr>
             </table>
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
            <table class="table table-bordered table-hover">
                 <tr>
                     <td width="40%"><strong>Nama Usaha</strong></td>
                     <td width="5%">:</td>
                     <td width="55">{{$pendaftaran->nama_usaha}}</td>
                 </tr>
                 <tr>
                     <td><strong>Sektor</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->nama_sektor}}</td>
                 </tr>
                 <tr>
                     <td><strong>Mulai Usaha</strong></td>
                     <td>:</td>
                     <td>{{TanggalAja($pendaftaran->mulai_usaha)}}</td>
                 </tr>
                 <tr>
                     <td><strong>Jumlah Karyawan</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->jml_karyawan}}</td>
                 </tr>
                 <tr>
                     <td><strong>Alamat Usaha</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->alamat_usaha}}</td>
                 </tr>
                 <tr>
                     <td><strong>Ada Legalitas</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->ada_legalitas}}</td>
                 </tr>
                 <tr>
                     <td><strong>Nama Legalitas</strong></td>
                     <td>:</td>
                     <td>@if($pendaftaran->nama_legalitas != Null){{$pendaftaran->nama_legalitas}}@else - @endif</td>
                 </tr>
                 <tr>
                     <td><strong>Badan Hukum</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->nama_badan_hukum}}</td>
                 </tr>
                 <tr>
                     <td><strong>Sistem Penjualan</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->sistem_penjualan}}</td>
                 </tr>
                 <tr>
                     <td><strong>Media Online yang digunakan untuk usaha</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->media_online}}</td>
                 </tr>
                 <tr>
                     <td><strong>Media Sosial/Website yang dimiliki usaha</strong></td>
                     <td>:</td>
                     <td>{{$pendaftaran->sosmed}}</td>
                 </tr>

                @if($pendaftaran->jenis_usaha == 'Jasa')
                    <tr>
                        <td><strong>Usaha Menghasilkan Barang?</strong></td>
                        <td>:</td>
                        <td>{{$pendaftaran->hasil_barang}}</td>
                    </tr>
                    <tr>
                        <td><strong>Sifat Produk Bisnis?</strong></td>
                        <td>:</td>
                        <td>{{$pendaftaran->sifat_produk}}</td>
                    </tr>
                    <tr>
                        <td><strong> Usaha Dibina oleh Instansi Pemerintah/Swasta?</strong></td>
                        <td>:</td>
                        <td>{{$pendaftaran->dibina}} @if($pendaftaran->dibina == 'Ya'), {{$pendaftaran->binaan}} @endif</td>
                    </tr>
                    <tr>
                        <td><strong> Usaha bersifat Freelance/Perorangan? </strong></td>
                        <td>:</td>
                        <td>{{$pendaftaran->sifat_freelance}}</td>
                    </tr>
                    <tr>
                        <td><strong> Memiliki Sertifikat Khusus/ Keahlian? </strong></td>
                        <td>:</td>
                        <td>{{$pendaftaran->ada_sertifikat}}</td>
                    </tr>
                    <tr>
                        <td><strong> Usaha tergabung dalam Satu Komunitas/Asosiasi? </strong></td>
                        <td>:</td>
                        <td>{{$pendaftaran->ada_komunitas}} @if($pendaftaran->ada_komunitas == 'Ada'), {{$pendaftaran->nama_komunitas}} @endif</td>
                    </tr>
                @endif
             </table>
            
          </div>
          
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@if($pendaftaran->verifikasi == 'N')
<a href="/pendaftaran/verifikasi/{{$pendaftaran->uuid}}" class="btn btn-success btn-block">Verifikasi Sebagai Pelaku EKRAF Jambi</a>
@else

@endif