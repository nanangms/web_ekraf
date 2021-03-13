{!! Form::model($model, [
    'route' => $model->exists ? ['badanhukum.update', $model->id] : 'badanhukum.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}
<div class="form-group">
    <label>Nama Badan Hukum <span class="text-danger">*</span></label>
    {!! Form::text('nama_badan_hukum', null, ['class' => 'form-control', 'id' => 'nama_badan_hukum','placeholder' =>'Nama Badan Hukum']) !!}
</div>
{!! Form::close() !!}