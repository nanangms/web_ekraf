<div class="row">
  <div class="col-md-12 col-sm-6">
    <div class="card card-primary card-tabs">
      <div class="card-header p-0 pt-1">

      </div>
      <div class="card-body">
        <div class="tab-content" id="custom-tabs-one-tabContent">
           <table class="table table-bordered table-hover">
               <tr>
                   <td width="30%"><strong>Nama Usaha</strong></td>
                   <td width="5%">:</td>
                   <td width="65">{{$produk->nama_usaha}}</td>
               </tr>
               <tr>
                   <td><strong>Nama Produk</strong></td>
                   <td>:</td>
                   <td>{{$produk->nama_produk}}</td>
               </tr>
               <tr>
                   <td><strong>Harga</strong></td>
                   <td>:</td>
                   <td>Rp. {{ number_format($produk->harga)}}</td>
               </tr>
               <tr>
                   <td><strong>Deskripsi</strong></td>
                   <td>:</td>
                   <td>{{$produk->deskripsi}}</td>
               </tr>
               <tr>
                   <td><strong>Gambar</strong></td>
                   <td>:</td>
                   <td><a href="{{$produk->getImageProduk()}}" target="_blank"><img src="{{$produk->getImageProduk()}}" width="100px"></a></td>
               </tr>
           </table>
       </div>
   </div>
   <!-- /.card -->
</div>
</div>
</div>