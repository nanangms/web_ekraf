<form action="/setting/submenu/update/{{$model->uuid}}" method="post">
@csrf
<div class="form-group">
    <label>Nama Menu</label>
    <input type="text" name="nama_menu" value="{{$model->nama_menu}}" class="form-control">
</div>

<div class="form-group">
    <label>URL</label>
    <input type="text" name="url" value="{{$model->url}}" class="form-control">
    
</div>
<input type="hidden" name="id_menu" value="{{$model->id_menu}}" class="form-control">
<div class="form-group">
    <label>Icon</label>
    <input type="text" name="icon" value="{{$model->icon}}" class="form-control">

</div>
<div class="form-group">
    <label>Urutan</label>
    <input type="text" name="urutan" value="{{$model->urutan}}" class="form-control">

</div>
<div class="form-group">
    <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> SIMPAN</button>

</div>
</form>