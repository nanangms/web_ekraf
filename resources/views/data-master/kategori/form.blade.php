
{!! Form::model($model, [
    'route' => $model->exists ? ['kategori.update', $model->id] : 'kategori.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

    <div class="form-group">
        <div class="form-line focused">
        	{!! Form::text('nama_kategori', null, ['class' => 'form-control', 'id' => 'nama_kategori','placeholder' =>'Nama Kategori']) !!}
        </div>
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