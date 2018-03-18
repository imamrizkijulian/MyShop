@extends('layouts.simintatemp')

@section('content')
    <!-- Content Header (Page header) -->
    <!-- Content Header (Page header) -->
    <div class="row">
      <!--  page header -->
      <div class="col-lg-12">
          <h1 class="page-header">Supplier</h1>
      </div>
      <!-- end  page header -->
    </div>
            
      <ol class="breadcrumb">
          <li><a href="/simintatemp"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Edit</li>
      </ol>

    <div class="panel panel-primary">
       <div class="panel-heading"> 
          <h2 class="panel-title">Edit Suplier</h2> 
       </div><hr>
          {!! Form::model($suplier, ['url' => route('suplier.update', $suplier->id), 'method' => 'put', 'files' => 'true', 'class' => 'form-horizontal']) !!}
            @include('suplier.forms')
          {!! Form::close() !!}
    </div>
          
@endsection

