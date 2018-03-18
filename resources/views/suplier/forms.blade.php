<div class="form-group {!! $errors->has('nama_suplier') ? 'has-error' : '' !!}"> 
    {!! Form::label('nama_suplier', 'Nama Suplier', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-8">
        {!! Form::text('nama_suplier', null, ['class'=>'form-control', 'placeholder' => 'nama suplier']) !!} 
        {!! $errors->first('nama_suplier', '<p class="help-block">Tidak Boleh Kosong!</p>') !!} 
    </div> 
</div>

<div class="form-group {!! $errors->has('alamat') ? 'has-error' : '' !!}">
    {!! Form::label('alamat', 'Alamat', ['class'=>'col-md-2 control-label']) !!}
    <div class="col-md-8">
    {!! Form::textarea('alamat', null, ['class'=>'form-control', 'placeholder' => 'alamat']) !!}
    {!! $errors->first('alamat', '<p class="help-block">Tidak Boleh Kosong!</p>') !!}
    </div>
</div>

<div class="form-group {!! $errors->has('telepon') ? 'has-error' : '' !!}"> 
    {!! Form::label('telepon', 'Telepon', ['class'=>'col-md-2 control-label']) !!} 
    <div class="col-md-8">
        {!! Form::number('telepon', null, ['class'=>'form-control', 'placeholder' => 'telepon']) !!}
        {!! $errors->first('telepon', '<p class="help-block">Tidak Boleh Kosong || Max 13 digit!</p>') !!} 
    </div> 
</div>

<div class="form-group"> 
    <div class="col-md-8 col-md-offset-2"> 
        {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!} 
    </div> 
</div>
