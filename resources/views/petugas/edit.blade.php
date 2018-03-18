@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Edit Pegawai</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>
    <!-- /.Content header -->
<div class="panel panel-footer">
        {!! Form::model($petugas, ['url' => route('petugas.update', $petugas->id), 'method' => 'put', 'files' => 'true', 'class' => 'form-horizontal']) !!}
          <div class="row">
            <div class="col-lg-12 col-sm-12">
                  <label>Nama Pegawai</label>
                  <td><input type="text" name="np" class="form-control" value="{{$petugas->name}}"></td>

                  <label>Email</label>
                  <td><input type="email" name="em" class="form-control" value="{{$petugas->email}}"></td>

                  <label>Password</label>
                  <td><input type="password" name="pw" class="form-control" value="{{$petugas->password}}"></td><br>
                  
              <td>
                  <input type="submit" name="submit" class="btn btn-info" value="Simpan">
              </td>
              
            </div>
          </div>
                {!!Form::close()!!}
</div>    
@endsection
