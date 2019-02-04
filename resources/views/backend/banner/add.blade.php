@extends('adminlte::page')

@section('title', 'TFRD')

@section('content_header')
<h1 class="pull-left">Banner</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/banner')}}"><i class="fa fa-undo"></i> Back</a></div>
@stop

@section('content')
<div class="pull-left col-xs-12" style="margin-top:15px;">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Add Image Banner to Home Page</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'foo/bar')) }}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Enter title of banner">
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input type="text" class="form-control" id="keyword" placeholder="images,banner,tfrd,มปอ,...">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image">
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
