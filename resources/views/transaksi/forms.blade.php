<div class="row">
    <div class="col-md-12">
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('barang_id') ? ' has-error': '' }}">
                {!! Form::label('barang_id', 'Nama Barang', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                {!! Form::select('barang_id', array('' => 'Pilih ...')+App\Barang::pluck('nama_barang','id')->all(), null, ['class' => 'form-control']) !!} {!! $errors->first('nama_barang', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group{{ $errors->has('name') ? ' has-error': '' }}">
                {!! Form::label('jumlah', 'Jumlah Barang', ['class' => 'col-md-4 control-label']) !!}
                <div class="col-md-6">
                {!! Form::text('jumlah', null, ['class' => 'form-control']) !!}
                {!! $errors->first('jumlah', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
        </div>
        
    </div>
</div>

<div class="row">
        <div class="form-group">
            <div class="col-md-4 col-md-offset-2">
                {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
            </div>
        </div>
</div>