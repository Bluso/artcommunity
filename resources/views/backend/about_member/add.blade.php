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
        {{ Form::open(array('url' => 'backend/about/member/add', 'method' => 'post','enctype' => 'multipart/form-data')) }}
        {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Enter name of member" require>
                </div>
                <div class="form-group">
                    <label for="title">Position</label>
                    <input name="position" type="text" class="form-control" id="position" placeholder="Enter position of member">
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input class="file" type="file" name="image" id="image" data-preview-file-type="text" required>
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
@stop
