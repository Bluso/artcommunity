@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
@include('backend.layouts.css_fileinput')
@stop
@section('content_header')
<h1 class="pull-left">Categorires of Knowledge</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/knowledge')}}"><i class="fa fa-undo"></i> Back</a></div>
@stop

@section('content')
<div class="pull-left col-xs-12" style="margin-top:15px;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Add knowledge</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/knowledge/cate/add', 'method' => 'post','enctype' => 'multipart/form-data','id'=>'form-validate','data-toggle'=>'validator','role'=>'form')) }}
        {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Enter title of knowledge" data-error="กรุณากรอกชื่อหัวข้อ" maxlength="255" required>
                    <p class="help-block">Maximum character is 255</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <input name="description" type="text" class="form-control" id="description" placeholder="Enter title of description" data-error="กรุณากรอกคำอธิบาย" maxlength="255" required>
                    <p class="help-block">Maximum character is 255</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input name="keywords" type="text" class="form-control" id="keyword" placeholder="images,banner,tfrd,มปอ,...">
                </div>
                <div class="form-group">
                    <label style="width:100%" for="">Thumb</label>
                    <input class="file" type="file" name="thumb" id="thumb" data-preview-file-type="text">
                    <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ Form::close() }}
    </div>
</div>
@stop
@section('js')
@include('backend.layouts.js_fileinput')
<script src="{{ asset('js/validator.js')}}"></script>
<script>
$('#form-validate').validator().on('submit', function (e) {
    if (e.isDefaultPrevented()) {
        // handle the invalid form...
    } else {
        // everything looks good!
    }
});
</script>
@stop