@extends('adminlte::page')

@section('title', 'TFRD')
@section('content_header')
<h1>
    Contact
    <small>Address detail</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Contact</li>
</ol>
   
@stop

@section('content')
<div class="box box-solid">
  <div class="box-header with-border">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Contact Data</h3>
  </div>
  <!-- /.box-header -->
  {{ Form::open(array('url' => 'backend/contact/save', 'method' => 'post')) }}
  {{csrf_field()}}
  <div class="box-body">
      <p>Title Thai Language</p>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-comment"></i></span>
        <input type="text" class="form-control" name="name_th" placeholder="Title Thai Language"  value="{!!$contact->name_th ?? ''!!}">
      </div>
      <br>
      <p>Title English Language</p>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-comment"></i></span>
        <input type="text" class="form-control" name="name_en" placeholder="Title English Language"  value="{!!$contact->name_en ?? ''!!}">
      </div>
      <br>
      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" rows="3" name="address" placeholder="Enter ...">{!!$contact->address ?? ''!!}</textarea>
      </div>
      <br>
      <p>Telephone.</p>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
        <input type="text" class="form-control" name="telephone" placeholder="Telephone"  value="{!!$contact->telephone ?? ''!!}">
      </div>
      <br>
      <p>Fax.</p>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-fax"></i></span>
        <input type="text" class="form-control" name="fax" placeholder="fax"  value="{!!$contact->fax ?? ''!!}">
      </div>
      <br>
      <p>Email</p>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
        <input type="email" class="form-control" name="email" placeholder="Email"  value="{!!$contact->email ?? ''!!}">
      </div>
      <br>
      <p>URL.</p>
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-globe"></i></span>
        <input type="text" class="form-control" name="url" placeholder="url"  value="{!!$contact->url ?? ''!!}">
      </div>
  </div>
  <!-- /.box-body -->
  <button type="submit" class="btn bg-olive btn-flat margin">
  Save Address Data
  </button>
  {{ Form::close() }}
</div>
@stop

