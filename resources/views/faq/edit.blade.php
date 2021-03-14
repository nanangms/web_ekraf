<form action="/faq/{{$faq->uuid}}/update" class="form-horizontal" method="POST">
    {{csrf_field()}}

    <div class="form-group row">
        <label class="label-text col-lg-3 col-form-label text-md-right">Pertanyaan<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <textarea name="pertanyaan" id="pertanyaan" class="form-control" required>{{$faq->pertanyaan}}</textarea>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="label-text col-lg-3 col-form-label text-md-right">Jawaban<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <textarea name="jawaban" id="jawaban" class="form-control" required>{{$faq->jawaban}}</textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="label-text col-lg-3 col-form-label text-md-right">Kategori <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <select name="kategori" class="form-control" required>
                <option value="">--Pilih Kategori--</option>
                <option value="Umum" @if($faq->kategori == 'Umum') selected @endif>Umum</option>
                <!-- <option value="Briva">Briva</option> -->
            </select>
            
        </div>
    </div>

    <div class="form-group row">
        <label class="label-text col-lg-3 col-form-label text-md-right">Urutan <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            <input type="text" name="urutan" id="urutan" value="{{$faq->urutan}}" class="form-control" required>
        </div>
    </div>

    
    <div class="form-group row">
        <label class="label-text col-lg-3 col-form-label text-md-right"></label>
        <div class="col-lg-9">
           <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>
</form>