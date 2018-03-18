@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Supplier</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>

  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
          <center><h3>Buat Data Suplier</h3></center>
            {!! Form::open(['url' => route('suplier.store'), 'method' => 'post','files'=>'true','class'=>'form-horizontal']) !!} 
              @include('suplier.forms')
            {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <tr class="success">
                          <th>Kode Suplier</th>
                          <th>Nama Suplier</th>
                          <th>Alamat</th>
                          <th>Telepon</th>
                          <th width="200px">Actions</th>
                        </tr>

                        @foreach ($suplier as $data)
                        <tr>
                          <td>{{ $data->id }}</td>
                          <td>{{ $data->nama_suplier }}</td>
                          <td>{{ $data->alamat }}</td>
                          <td>{{ $data->telepon }}</td>
                          <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('suplier.edit', $data->id) }}">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route'=>['suplier.destroy', $data->id], 'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete',['class'=> 'btn btn-xs btn-danger']) !!}
                            {!! Form::close() !!}
                          </td>
                        </tr>
                        @endforeach
                      </table>
                      {!! $suplier->render() !!}
              </div>
            </div>
          </div>
        </div>
    </div>

    
  
@endsection

