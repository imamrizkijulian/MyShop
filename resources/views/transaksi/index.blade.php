@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Transaksi Jual</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>
    <!-- /.Content header -->

    <!-- Main content form pembuatan transaksi -->
    <div class="panel panel-footer">
        {!!Form::open(array('route'=>'transaksi.store','id'=>'insert_form','method'=>'post'))!!}
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <table class="table table-bordered">
                <thead>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th style="text-align: center;"><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <select name="nama_barang[]" class="form-control nama_barang">
                        <option value="0" selected="true" disabled="true">Select Product</option>
                        @foreach($barang as $data)
                        <option value="{{$data->id}}">{{$data->nama_barang}}</option>
                        @endforeach
                      </select>
                    </td>
                    <td><input type="number" name="jumlah[]" class="form-control jumlah"></td>
                    <td style="text-align: center;"><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></a></td>
                  </tr>
                </tbody>
              </table>
              <td>
                  <input type="submit" name="submit" class="btn btn-info" value="Simpan">
              </td>
              <a href="{{url('/data')}}" class="btn btn-primary">Lihat Data</a>

            </div>
          </div>
        {!!Form::close()!!}
      </div>
    <!-- /.Content transaksi -->
<script type="text/javascript">
  $('.addRow').on('click',function(){
    addRow();
  });
  function addRow()
  {
    var tr='<tr>'+
              '<td>'+
              '<select name="nama_barang[]" class="form-control nama_barang">'+
                '<option value="0" selected="true" disabled="true">Select Product</option>'+
                  '@foreach($barang as $data)'+
                    '<option value="{{$data->id}}">{{$data->nama_barang}}</option>'+
                    '@endforeach'+          
              '</select>'+
            '</td>'+
            '<td><input type="number" name="jumlah[]" class="form-control jumlah"></td>'+
            '<td style="text-align: center;"><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></a></td>'+
          '</tr>';
      $('tbody').append(tr);
  };
  $('.remove').live('click',function(){
    var l=$('tbody tr').length;
    if (l==1) 
    {
      alert('Tidak bisa di hapus.')
    }else{
    $(this).parent().parent().remove();
    total();
    }
  });
</script>
@endsection
