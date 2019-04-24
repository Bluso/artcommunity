@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
@include('backend.layouts.css_fileinput')
@stop
@section('content_header')
<h1 class="pull-left">Youtube</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/youtube')}}"><i class="fa fa-undo"></i> Back</a></div>
@stop

@section('content')
<div class="pull-left col-xs-12" style="margin-top:15px;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Edit Youtube</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/youtube/edit/'.$youtube->id, 'method' => 'post','enctype' => 'multipart/form-data','id'=>'form-validate','data-toggle'=>'validator','role'=>'form')) }}
        {{csrf_field()}}

            <div class="box-body">
                <div id="youtube_category" class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="cate_id" id="category" data-error="กรุณาเลือกหมวดหมู่ของ Youtube" required>
                        @if($youtube->cate_id)
                              <option value="{{$youtube->cate->id}}">{{$youtube->cate->title}}</option>
                            @foreach($category as $c)
                                @if($youtube->cate->id != $c->id)
                                <option value="{{$c->id}}">{{$c->title}}</option>
                                @endif
                            @endforeach
                        @else
                            <option value="">Select youtube category</option>
                            @foreach($category as $c)
                                <option value="{{$c->id}}">{{$c->title}}</option>
                            @endforeach
                        @endif
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                @if($category->count() == 0)
                <div id="addcate" class="form-group hidden">
                    <p class="addcate text-danger">ตอนนี้ยังไม่มีหมวดหมู่ของข่าว คลิก "+ Add New Category" เพื่อสร้าง Category</p>
                    <a href="{{url('/backend/youtube/cate/add')}}" id="addcatebtn" class="addcate btn btn-primary" data-disable="true">+ Add New Category</a>
                </div>
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ $youtube->title }}" data-error="กรุณากรอกชื่อ Youtube" maxlength="255" required>
                    <p class="help-block">Maximum character is 255</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="title">Youtube URL</label>
                    <input name="url" type="text" class="form-control" id="url" value="https://www.youtube.com/watch?{{ $youtube->youtube }}" maxlength="255" placeholder="Enter URL of Youtube" data-error="กรุณากรอก Youtube URL" required>
                    <input name="urlstrim" id="urlstrim" type="hidden" value="{{ $youtube->youtube }}">
                    <p class="help-block">Maximum character is 255</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input name="keywords" type="text" class="form-control" id="keyword" value="{{ $youtube->keywords }}">
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
        $('#url').on('change', function(){
            var newval = '',
                $this = $(this);
                $url = $(this).val();
                $urlstrim = $('#urlstrim').val($url);
            if (newval = $this.val().match(/(\?|&)v=([^&#]+)/)) {
                $urlstrim.val(newval.pop());
            } else if (newval = $this.val().match(/(\.be\/)+([^\/]+)/)) {
                $urlstrim.val(newval.pop());
            } else if (newval = $this.val().match(/(\embed\/)+([^\/]+)/)) {
                $urlstrim.val(newval.pop().replace('?rel=0',''));
            }
        });
</script>
@stop
