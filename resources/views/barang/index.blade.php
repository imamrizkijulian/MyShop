@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Barang</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>
    <!-- /.Content header -->

    <!-- Form membuat barang -->
    <div class="box box-primary">
       <!-- <center><h2>Buat Data Barang</h2></center><hr>
        {!! Form::open(['url' => route('barang.store'), 'method' =>'post','files'=>'true','class'=>'form-horizontal']) !!}
        {{ csrf_field() }}
        @include('barang.forms')
        {!! Form::close() !!} -->
    </div>
    <!-- /.Form barang -->

    <!-- Main content data barang -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <tr class="success">
                  <th>Gambar</th>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Harga Jual</th>
                  <th>Harga Beli</th>
                  <th>Stok</th>
                  <th>Status</th>
                  <th>Nama Supplier</th>
                  <th width="200px">Actions</th>
                </tr>

                @foreach ($barang as $data)
                <tr>
                  <td><img src="{{ asset('/img/'.$data->gambar.'') }}" width="60px" height="60px"></td>
                  <td>{{ $data->id }}</td>
                  <td>{{ $data->nama_barang }}</td>
                  <td>{{ $data->harga_jual }}</td>
                  <td>{{ $data->harga_beli }}</td>
                  <td>{{ $data->stok }} {{ $data->satuan }}</td>
                  <td>{{ $data->status }}</td>
                  <td>{{ $data->suplier->nama_suplier }}</td>
                  <td>
                    {!! Form::open(['method' => 'DELETE', 'route'=>['barang.destroy', $data->id], 'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete',['class'=> 'btn btn-xs btn-danger']) !!}
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </table>
              {!! $barang->render() !!}
            </div>
          </div>
        </div>
      </div>
    </div> 
    <!-- /.content data barang -->
@endsection
