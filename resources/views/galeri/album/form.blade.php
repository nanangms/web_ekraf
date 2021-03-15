
{!! Form::model($model, [
    'route' => $model->exists ? ['album.update', $model->id] : 'album.store',
    'method' => $model->exists ? 'PUT' : 'POST'
]) !!}

   <div class="form-group">
        <label>Nama Album</label>
        {!! Form::text('nama_album', null, ['class' => 'form-control', 'id' => 'nama_album','placeholder' =>'Nama Album']) !!}
    </div>

    <div class="form-group">
        <label>Publish</label><br>
        <input type='radio' name='published' value='Y' checked id="published"> Ya &nbsp; <input type='radio' name='published' value='N' id="published"> Tidak 
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