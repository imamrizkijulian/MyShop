@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Data Transaksi Jual</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>
    <!-- /.Content header -->
<div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading"> 
              <center><h3 class="panel-title">Data Transaksi Jual</h3></center>
          </div>
          <div class="box-body">
                    <table class="table">
                    <tr class="success">
                      <th>Nama Barang</th>
                      <th>Harga Barang</th>
                      <th>Jumlah Barang</th>
                      <th>Total</th>
                    </tr>

                    @foreach (App\Transaksi::all() as $data)
                    <tr>
                      <td>{{ $data->barang->nama_barang }}</td>
                      <td>{{ $data->barang->harga_jual }}</td>
                      <td>{{ $data->jumlah }}</td>
                      <td>{{ $data->ket }}</td>
                    </tr>
                    @endforeach
                  </table>
                  
          </div>
        </div>
      </div>
</div>
@endsection
