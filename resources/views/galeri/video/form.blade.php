
{!! Form::model($model, [
    'route' => $model->exists ? ['video.update', $model->id] : 'video.store',
    'method' => $model->exists ? 'PUT' : 'POST'
    ]) !!}

    <div class="form-group">
        <label>Judul</label>
        {!! Form::text('judul', null, ['class' => 'form-control', 'id' => 'judul','placeholder' =>'Judul']) !!}

    </div>

    <div class="form-group">
        <label>Link Video</label>
        {!! Form::text('link_video', null, ['class' => 'form-control', 'id' => 'link_video','placeholder' =>'Link Video']) !!}

    </div>

    <div class="form-group">
        <label>Publish</label><br>
        <input type='radio' name='published' value='Y' @if($model->published == 'Y') checked @endif id="published"> Ya &nbsp; <input type='radio' name='published' value='N' @if($model->published == 'N') checked @endif id="published"> Tidak 

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