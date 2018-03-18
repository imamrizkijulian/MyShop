@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Laporan Pembelian</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>
    <!-- /.Content header -->

    <div class="row">
  <div class="col-xs-12">
  <div class="panel panel-default">
    <div class="panel-heading">
    <div class="panel-title pull-right"></div></div>
    <div class="panel-body">
      <table class="table">
        <form action="{{url('admin/laporan2/detail2')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
          <label class="control-lable">Tanggal Awal</label>
          <input type="date" name="a" required="">

          <label class="control-lable">Tanggal Akhir</label>
          <input type="date" name="b" required="">
          <input type="submit" class="btn btn-info" name="submit" value="Cetak">
        </div>
        </form>
      </table>  
    </div>
  </div>
</div>
</div>
    
@endsection
