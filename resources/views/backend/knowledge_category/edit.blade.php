@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
<link rel="stylesheet" href="{{ asset('css/image_preview.css')}} ">
@stop
@section('content_header')
<h1 class="pull-left">Categorires of Knowledge</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/knowledge')}}"><i class="fa fa-undo"></i> Back</a></div>
@stop

@section('content')
<div class="pull-left col-xs-12" style="margin-top:15px;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Edit knowledge</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/knowledge/cate/edit/'.$category->id, 'method' => 'post','enctype' => 'multipart/form-data')) }}
        {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{$category->title}}" require>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <input name="description" type="text" class="form-control" id="description" value="{{$category->description}}" require>
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input name="keywords" type="text" class="form-control" id="keyword" value="{{$category->keywords}}">
                </div>
                <div class="form-group">
                    @if(!empty($category->thumb))
                    <img style="margin-bottom:15px;" src="{{asset('storage/images/cate_knowledge')}}/{{$category->thumb}}" />
                    @endif
                    <div class="custom-preview" style="width: 300px">
                        <label class="custom-preview-label" for="">Thumb</label>
                        <input class="custom-preview-input" type="file" name="thumb" id="thumb" preview="thumb-preview" require>
                    </div>
                    <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                    <div class="preview" id="thumb-preview"></div>
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
<script src="{{ asset('js/image_preview.js') }}"></script>
@stop