@extends('adminlte::page')

@section('title', 'TFRD')

@section('content_header')
<h1>
Home Page
</h1>
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Home</li>
</ol>
@stop
@section('css')
    @include('backend.layouts.css_fileinput')
@stop
@section('content')
<section class="main-intro box">
    <div class="col-xs-12">
        {{ Form::open(array('url' => 'backend/home/edit/'.$home->id, 'method' => 'post','enctype' => 'multipart/form-data')) }}
        {{csrf_field()}}
        <div class="form-group">
            <img class="center-block pull-left" style="margin-bottom:15px; margin-top:15px;" src="{{asset('storage/images/home/thumb')}}/{{$home->thumb}}" />
            <label style="width:100%" for="">Thumb</label>
            <input class="file" type="file" name="thumb" id="thumb" data-preview-file-type="text" required>
            <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
        </div>
        <div class="form-group">
            <label for="title">URL</label>
            <input name="url" type="text" class="form-control" id="url" value="{{ $home->url }}">
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $home->title }}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input name="description" type="text" class="form-control" id="description" value="{{ $home->description }}">
        </div>
        <div class="form-group">
            <label for="description">Keyword</label>
            <input name="keyword" type="text" class="form-control" id="keyword" value="{{ $home->keyword }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {{ Form::close() }}
    </div>
</section>
@stop
@section('js')
    @include('backend.layouts.js_fileinput')
@stop