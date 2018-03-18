@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Beli Stok Barang Yang Sudah Ada</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>
    <!-- /.Content header -->


    <!-- Content Header (Page header) -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
                  {!! Form::model($barang,['url' => route('trxbeli.update',$barang->id), 'method' => 'put', 'class' => 'form-horizontal', 'files'=>'true']) !!}

                  <div class="row">
                    <div class="col-md-6">

                    <div class="form-group {!! $errors->has('nama_barang') ? 'has-error' : '' !!}"> 
                        {!! Form::label('nama_barang', 'Nama Barang', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-8">
                            {!! Form::text('nama_barang', null, ['class'=>'form-control', 'placeholder' => 'input barang baru', 'readonly']) !!} 
                            {!! $errors->first('nama_barang', '<p class="help-block">Nama Barang Harus Diisi!</p>') !!} 
                        </div> 
                    </div>

                    <div class="form-group {!! $errors->has('nama_suplier') ? 'has-error' : '' !!}"> 
                        {!! Form::label('nama_suplier', 'Nama Suplier', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="nama_suplier" value="{{$barang->suplier->nama_suplier}}" readonly="">
                        </div>
                    </div>

                    <div class="form-group required {!! $errors->has('harga_beli') ? 'has-error' : '' !!}">
                        {!! Form::label('harga_beli', 'Harga Beli', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                {!! Form::text('harga_beli', null, ['class'=>'form-control text-right', 'placeholder' => 'harga beli', 'readonly']) !!} 
                                {!! $errors->first('harga_beli', '<p class="help-block">Harga Harus Sesuai !</p>') !!}
                            </div>
                        </div>
                    </div>
          
                    <div class="form-group required {!! $errors->has('harga_jual') ? 'has-error' : '' !!}">
                        {!! Form::label('harga_jual', 'Harga Jual', ['class'=>'col-md-4 control-label']) !!}
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-addon">Rp</span>
                                {!! Form::text('harga_jual', null, ['class'=>'form-control text-right', 'placeholder' => 'harga jual', 'readonly']) !!} 
                                {!! $errors->first('harga_jual', '<p class="help-block">Harga Harus Sesuai !</p>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group {!! $errors->has('jumlah') ? 'has-error' : '' !!}"> 
                        {!! Form::label('jumlah', 'Jumlah', ['class'=>'col-md-4 control-label']) !!} 
                        <div class="col-md-8">
                            {!! Form::text('jumlah', null, ['class'=>'form-control', 'placeholder' => 'jumlah']) !!} 
                            {!! $errors->first('title', '<p class="help-block">:message</p>') !!} 
                        </div> 
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-body">
                        <center><img src="{{ asset('/img/'.$barang->gambar.'') }}" width="280px" height="280px"></center>
                      </div>
                    </div>
                  </div>

                    <div class="form-group"> 
                      <div class="col-md-12 col-md-offset-5"> 
                          {!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
                      </div> 
                    </div> 

              </div>
            </div>
          </div>
        </div>
      </div>
{!! Form::close() !!}

    <!-- /. Form modal -->

@endsection
