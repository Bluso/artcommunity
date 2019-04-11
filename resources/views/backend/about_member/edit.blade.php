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
            <h3 class="box-title">Add Image Banner to Home Page</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/about/member/edit/'.$member->id, 'method' => 'post','enctype' => 'multipart/form-data','id'=>'form-validate','data-toggle'=>'validator','role'=>'form')) }}
        {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{$member->name}}" data-error="กรุณากรอกชื่อผู้บริหาร"  maxlength="255" required>
                    <p class="help-block">Maximum character is 255</p>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input name="position" type="text" class="form-control" id="position" value="{{$member->position}}" data-error="กรุณากรอกตำแหน่งผู้บริหาร"  maxlength="255" required>
                    <p class="help-block">Maximum character is 255</p>
                </div>
                <div class="form-group">
                    <img style="margin-bottom:15px;max-width:200px;border: solid thin #ddd;" src="{{asset('storage/images/about/member')}}/{{$member->image}}" />
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
