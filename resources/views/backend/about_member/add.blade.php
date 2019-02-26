@extends('adminlte::page')

@section('title', 'TFRD')

@section('css')
@include('backend.layouts.css_fileinput')
@stop
@section('content_header')
    <h1 class="pull-left">Banner</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/about/member')}}"><i class="fa fa-undo"></i> Back</a></div>
@stop

@section('content')
<div class="pull-left col-xs-12" style="margin-top:15px;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Add member</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/about/member/add', 'method' => 'post','enctype' => 'multipart/form-data','id'=>'form-validate','data-toggle'=>'validator','role'=>'form')) }}
        {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter name of member" data-error="กรุณากรอกชื่อผู้บริหาร" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="title">Position</label>
                    <input name="position" type="text" class="form-control" id="position" placeholder="Enter position of member" data-error="กรุณากรอกตำแหน่งผู้บริหาร" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input class="file" type="file" name="image" id="image" data-preview-file-type="text" data-error="กรุณาเลือกรูปผู้บริหาร" required>
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
    })
</script>
@stop

