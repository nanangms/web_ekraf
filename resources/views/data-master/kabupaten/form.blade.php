
{!! Form::model($model, [
    'route' => $model->exists ? ['kabupaten.update', $model->id] : 'kabupaten.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

<div class="form-group">
    <label>Nama Kab/Kota <span class="text-danger">*</span></label>
    {!! Form::text('nama_kab_kota', null, ['class' => 'form-control', 'id' => 'nama_kab_kota','placeholder' =>'Nama Kab/Kota']) !!}
</div>

 

{!! Form::close() !!}
<script>
	$.AdminBSB.input = {
    activate: function ($parentSelector) {
        $parentSelector = $parentSelector || $('body');
        //On focus event
        $parentSelector.find('.form-control').focus(function () {
            $(this).closest('.form-line').addClass('focused');
        });
    }
</script>