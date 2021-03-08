
{!! Form::model($model, [
    'route' => $model->exists ? ['event.update', $model->id] : 'event.store',
    'method' => $model->exists ? 'PUT' : 'POST'
    ]) !!}

    <div class="form-group">
        <label>Nama Event</label>
        {!! Form::text('nama_event', null, ['class' => 'form-control', 'id' => 'nama_event','placeholder' =>'Nama Event']) !!}
    </div>

    <div class="form-group">
        <label>Tanggal Event</label>
        {!! Form::date('tgl_event', null, ['class' => 'form-control', 'id' => 'tgl_event','placeholder' =>'Tanggal Event']) !!}
    </div>

    <div class="form-group">
        <label>Lokasi</label>
        {!! Form::text('lokasi', null, ['class' => 'form-control', 'id' => 'lokasi','placeholder' =>'Lokasi']) !!}
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi','placeholder' =>'Deskripsi']) !!}
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