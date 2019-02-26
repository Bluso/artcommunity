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
  {{ Form::open(array('url' => 'backend/contact/save', 'method' => 'post','id'=>'form-validate','data-toggle'=>'validator','role'=>'form')) }}
  {{csrf_field()}}
  <div class="box-body">
      <div class="form-group">
        <p>Title Thai Language</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-comment"></i></span>
          <input type="text" class="form-control" name="name_th" placeholder="Title Thai Language"  value="{!!$contact->name_th ?? ''!!}" data-error="กรุณากรอกชื่อภาษาไทย" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
      <br>
      <div class="form-group">
        <p>Title English Language</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-comment"></i></span>
          <input type="text" class="form-control" name="name_en" placeholder="Title English Language"  value="{!!$contact->name_en ?? ''!!}" data-error="กรุณากรอกชื่อภาษาอังกฤษ" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
      <br>
      <div class="form-group">
        <label>Address</label>
        <textarea class="form-control" rows="3" name="address" placeholder="Enter ..." data-error="กรุณากรอกที่อยู่" required>{!!$contact->address ?? ''!!}</textarea>
        <div class="help-block with-errors"></div>
      </div>
      <br>
      <div class="form-group">
        <p>Telephone.</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
          <input type="text" class="form-control" name="telephone" placeholder="Telephone"  value="{!!$contact->telephone ?? ''!!}" data-error="กรุณากรอกเบอร์โทรศัพท์" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
      <br>
      <div class="form-group">
        <p>Fax.</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-fax"></i></span>
          <input type="text" class="form-control" name="fax" placeholder="fax"  value="{!!$contact->fax ?? ''!!}">
        </div>
      </div>
      <br>
      <div class="form-group">
        <p>Email</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
          <input type="email" class="form-control" name="email" placeholder="Email"  value="{!!$contact->email ?? ''!!}" data-error="กรุณากรอกอีเมล์" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
      <br>
      <div class="form-group">
        <p>URL.</p>
        <div class="input-group">
          <span class="input-group-addon"><i class="fa fa-globe"></i></span>
          <input type="text" class="form-control" name="url" placeholder="url"  value="{!!$contact->url ?? ''!!}" data-error="กรุณากรอก url ของเว็ปไซต์" required>
        </div>
        <div class="help-block with-errors"></div>
      </div>
  </div>
  <!-- /.box-body -->
  <button type="submit" class="btn bg-olive btn-flat margin">
  Save Address Data
  </button>
  {{ Form::close() }}
</div>
@stop
@section('js')
<script src="{{ asset('js/validator.js')}}"></script>
<script>
    $('#form-validate').validator().on('submit', function (e) {
        if (e.isDefaultPrevented()) {
            // handle the invalid form...
        } else {
            // everything looks good!
        }
    })
</script>
@stop


