<div class="modal fade" id="Tambah">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
          <form action="/event/tambah" class="form-horizontal" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class=" form-group row">
                <div class="col-md-12">
                  <label>Nama Event</label>
                  <input type="text" class="form-control" name="nama_event" required/>
                </div>
              </div>

              <div class=" form-group row">
                <div class="col-md-12">
                  <label>Tanggal Event</label>
                  <input type="date" class="form-control" name="tgl_event" required/>
                </div>
              </div>

              <div class=" form-group row">
                <div class="col-md-12">
                  <label>Lokasi</label>
                  <input type="text" class="form-control" name="lokasi" required/>
                </div>
              </div>

              <div class=" form-group row">
                <div class="col-md-12">
                  <label>Foto Banner</label>
                  <div class="row">
                    <div class="col-md-6">
                      <input type="file" class="form-control" name="foto_banner" onchange="readURL(this);" >
                    </div>
                    <div class="col-md-6">
                      <img id="preview_gambar" src="" style="width: 100px;" />
                    </div>
                  </div>

                  @if($errors->has('foto_banner'))
                  <span class="text-danger">{{$errors->first('foto_banner')}}</span>
                  @endif
                </div>
              </div>
              <div class=" form-group row">
                <div class="col-md-12">
                  <label>Deskripsi</label>
                  <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label>Publish<span class="text-danger">*</span></label><br>
                  <input type='radio' name='published' value='Y' checked> Ya &nbsp; <input type='radio' name='published' value='N'> Tidak  <br>
                  @if($errors->has('published'))
                  <span class="text-danger">{{$errors->first('published')}}</span>
                  @endif                                  
                </div>
              </div>

            
            <div class="form-group row">
                <div class="col-lg-12">
                   <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
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