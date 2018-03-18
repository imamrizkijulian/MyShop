@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Daftar Pegawai</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/backend"><i class="fa fa-dashboard"></i> Home</a></li>
              <!-- <li class="active">Dashboard</li> -->
      </ol>
    <!-- /.Content header -->
<div class="panel panel-footer">
        {!!Form::open(array('route'=>'petugas.store','id'=>'insert_form','method'=>'post'))!!}
          <div class="row">
            <div class="col-lg-12 col-sm-12">
                  <label>Nama Pegawai</label>
                  <td><input type="text" name="np" class="form-control"></td>

                  <label>Email</label>
                  <td><input type="email" name="em" class="form-control"></td>

                  <label>Password</label>
                  <td><input type="password" name="pw" class="form-control"></td>

                  <label>Role</label>
                  <td><select name="role" class="form-control">
                    @foreach($role as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                  </select></td><br>
                    
                  
              <td>
                  <input type="submit" name="submit" class="btn btn-info" value="Simpan">
              </td>
              
            </div>
          </div>
                {!!Form::close()!!}
</div>
            <div class="row">
                <div class="col-lg-6">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Data Pegawai
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                        <tr class="success">
                                          <th>Username</th>
                                          <th>Email</th>
                                          <th width="200px">Actions</th>
                                        </tr>
                                          @foreach ($petugas as $data)
                                          @if($loop->first)
                                        <tr>
                                          <td>{{ $data->name }}</td>
                                          <td>{{ $data->email }}</td>
                                          <td>
                                          <a class="btn btn-xs btn-primary" href="{{ route('petugas.edit', $data->id) }}"><span class="glyphicon glyphicon-edit"></span></a>

                                        </td>
                                        </tr>
                                        @else
                                        <tr>
                                          <td>{{ $data->name }}</td>
                                          <td>{{ $data->email }}</td>
                                          <td>
                                          <a class="btn btn-xs btn-primary" href="{{ route('petugas.edit', $data->id) }}"><span class="glyphicon glyphicon-edit"></span></a>

                                          {!! Form::open(['method' => 'DELETE', 'route'=>['petugas.destroy', $data->id], 'style'=>'display:inline']) !!}
                                          {!! Form::submit('Delete',['class'=> 'btn btn-xs btn-danger']) !!}
                                          {!! Form::close() !!}
                                        </td>
                                        </tr>
                                        @endif
                                      @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
            </div>         
@endsection
