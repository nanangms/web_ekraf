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
                     <td width="65">{{$pelaku->nama_pemilik}}</td>
                 </tr>
                 <tr>
                     <td><strong>NIK/Nomor Identitas</strong></td>
                     <td>:</td>
                     <td>{{$pelaku->nik_pemilik}}</td>
                 </tr>
                 <tr>
                     <td><strong>No. Hp</strong></td>
                     <td>:</td>
                     <td>{{$pelaku->wa_pemilik}}</td>
                 </tr>
                 <tr>
                     <td><strong>Email</strong></td>
                     <td>:</td>
                     <td>{{$pelaku->email_pemilik}}</td>
                 </tr>
                 <tr>
                     <td><strong>Kabupaten/Kota</strong></td>
                     <td>:</td>
                     <td>{{$pelaku->nama_kab_kota}}</td>
                 </tr>
                 <tr>
                     <td><strong>Sektor</strong></td>
                     <td>:</td>
                     <td>{{$pelaku->nama_sektor}}</td>
                 </tr>
             </table>
          </div>
          <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
            <table class="table table-bordered table-hover">
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
            
          </div>
          
        </div>
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>