@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Transaksi Beli</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>
    <!-- /.Content header -->

    <!-- Main content form pembuatan transaksi -->
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <center><h2>Buat Data Transaksi Barang</h2><button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">+Tambah Stok Barang</button></center><hr>
                {!! Form::open(['url' => route('trxbeli.store'), 'method' => 'post', 'class' => 'form-horizontal', 'files'=>'true']) !!}
                    @include('trxbeli.forms')
                {!! Form::close() !!} 
          </div>
        </div>
      </div>   
    </div>
    <!-- /.Content transaksi -->

    <!-- Form modal tambah stok barang -->
    <div class="modal fade" id="modal-tambah">
      <form action="{{ route('barang.store') }}" method="post">
        {{ csrf_field() }}
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-lable="close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h3 class="modal-title">Tambah Stok Barang Yang sudah Ada</h3>
            </div>
            <div class="modal-body">
                      <h3>Data Barang</h3>
                                <div class="box-body">
                                  <table class="table table-bordered">
                                    <tr class="success">
                                      <th>Gambar</th>
                                      <th>Nama Barang</th>
                                      <th>Harga Jual</th>
                                      <th>Harga Beli</th>
                                      <th>Stok</th>
                                      <th>Nama Supplier</th>
                                      <th width="200px">Actions</th>
                                    </tr>

                                    @foreach ($barang as $data)
                                    <tr>
                                      <td><img src="{{ asset('/img/'.$data->gambar.'') }}" width="60px" height="60px"></td>
                                      <td>{{ $data->nama_barang }}</td>
                                      <td>{{ $data->harga_jual }}</td>
                                      <td>{{ $data->harga_beli }}</td>
                                      <td>{{ $data->stok }} {{ $data->satuan }}</td>
                                      <td>{{ $data->suplier->nama_suplier }}</td>
                                      <td>
                                        <a class="btn btn-xs btn-success" href="{{ route('trxbeli.edit', $data->id) }}">Tambah</a>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </table>
                                  {!! $trxbeli->render() !!}
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>

    <!-- /. Form modal -->
    
    <!-- Main content data transaksi -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading"> 
              <center><h3 class="panel-title">Data Transaksi Beli</h3></center>
          </div>
          <div class="box-body">
                    <table class="table">
                    <tr class="success">
                      <th>Nama Supplier</th>
                      <th>Nama Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Harga Beli</th>
                      <th>Total</th>
                    </tr>

                    @foreach ($trxbeli as $data)
                    <tr>
                      <td>{{ $data->suplier->nama_suplier }}</td>
                      <td>{{ $data->nama_barang }}</td>
                      <td>{{ $data->jumlah }}</td>
                      <td>{{ $data->harga_beli }}</td>
                      <td>{{ $data->total }}</td>
                    </tr>
                    @endforeach
                  </table>
                  {!! $trxbeli->render() !!}
          </div>
        </div>
      </div>
    </div>

@endsection
