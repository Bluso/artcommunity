@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
<link rel="stylesheet" href="{{ asset('css/image_preview.css')}} ">
@stop
@section('content_header')
<h1 class="pull-left">Banner</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/banner')}}"><i class="fa fa-undo"></i> Back</a></div>
@stop

@section('content')
<div class="pull-left col-xs-12" style="margin-top:15px;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Add Image Banner to Home Page</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/banner/edit', 'method' => 'post','enctype' => 'multipart/form-data')) }}
        {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{$banner->title}}" require>
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input name="keywords" type="text" class="form-control" id="keyword"  value="{{$banner->keywords}}" placeholder="images,banner,tfrd,มปอ,...">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <img style="margin-bottom:15px;" src="{{asset('storage/images/banner')}}/{{$banner->images}}" />
                    <div class="custom-preview" style="width: 300px">
                        <label class="custom-preview-label" for="">Image</label>
                        <input class="custom-preview-input" type="file" name="image" id="image" preview="image-preview" require>
                    </div>
                    <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                    <div class="preview" id="image-preview"></div>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
                <input type="hidden" name="id" value="{{$banner->id}}" />
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ Form::close() }}
    </div>
</div>
@stop
@section('js')
<script src="{{ asset('js/image_preview.js') }}"></script>
@stop
