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
        {{ Form::open(array('url' => 'backend/home/edit/'.$home->id, 'id'=>'form-validate', 'method' => 'post','enctype' => 'multipart/form-data','data-toggle'=>'validator','role'=>'form' )) }}
        {{csrf_field()}}
        <div class="form-group">
            @if(!empty($home->thumb))
            <img class="center-block pull-left" style="margin-bottom:15px; margin-top:15px;" src="{{asset('storage/images/home/thumb')}}/{{$home->thumb}}" />
            <label style="width:100%" for="">Thumb</label>
            <input class="file" type="file" name="thumb" id="thumb" data-preview-file-type="text">
            @else
            <label style="width:100%" for="">Thumb</label>
            <input class="file" type="file" name="thumb" id="thumb" data-preview-file-type="text" required>
            @endif
            <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
        </div>
        <div class="form-group">
            <label for="title">URL</label>
            <input name="url" type="text" class="form-control" id="url" value="{{ $home->url }}" data-error="กรุณากรอกหน้าที่ต้องการให้ link ไป" maxlength="255" required >
            <p class="help-block">Maximum character is 255</p>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" type="text" class="form-control" id="title" value="{{ $home->title }}" data-error="กรุณากรอกหัวข้อหลัก" maxlength="255" required>
            <p class="help-block">Maximum character is 255</p>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input name="description" type="text" class="form-control" id="description" value="{{ $home->description }}" data-error="กรุณากรอกคำอธิบายของหัวข้อหลัก" maxlength="255"  required>
            <p class="help-block">Maximum character is 255</p>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <label for="description">Keyword</label>
            <input name="keyword" type="text" class="form-control" id="keyword" value="{{ $home->keywords }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        {{ Form::close() }}
    </div>
</section>
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
