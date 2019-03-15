@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.css') }}">
@include('backend.layouts.css_fileinput')
@stop
@section('content_header')
<h1 class="pull-left">News and activities</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/news')}}"><i class="fa fa-undo"></i> Back</a></div>
@stop

@section('content')
<div class="pull-left col-xs-12" style="margin-top:15px;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Edit News</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/news/edit/'.$news->id, 'method' => 'post','enctype' => 'multipart/form-data','id'=>'form-validate','data-toggle'=>'validator','role'=>'form')) }}
        {{csrf_field()}}
            
            <div class="box-body">
                <div class="form-group">
                    <label for="category">Type Category</label>
                    <select class="form-control" name="type" id="type" data-error="กรุณาเลือกประเภทของบทความ" required>
                        <option value="{{$news->type}}">{{ config('content.type.'.$news->type) }}</option>
                        @foreach(config('content.type') as $key => $c)
                            @if($news->type != $key)
                            <option value="{{$key}}">{{$c}}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div id="activity_category" class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="cate_id" id="category" data-error="กรุณาเลือกหมวดหมู่ของข่าว" >
                        <option value="{{$news->cate->id}}">{{$news->cate->title}}</option>
                        @foreach($category as $c)
                            @if($news->cate->id != $c->id)
                            <option value="{{$c->id}}">{{$c->title}}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" value="{{ $news->title }}" data-error="กรุณากรอกชื่อข่าว" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <input name="description" type="text" class="form-control" id="description" value="{{ $news->description }}" data-error="กรุณากรอกคำอธิบาย" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input name="keywords" type="text" class="form-control" id="keyword" value="{{ $news->keywords }}">
                </div>
                <div class="form-group">
                    <img style="margin-bottom:15px;max-width:200px;border: solid thin #ddd;" src="{{asset('storage/images/news/thumb')}}/{{$news->thumb}}" />
                    <label style="width:100%" for="">Thumb</label>
                    <input class="file" type="file" name="thumb" id="thumb" data-preview-file-type="text">
                    <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                </div>
                <div class="form-group">
                    <img style="margin-bottom:15px;max-width:200px;border: solid thin #ddd;" src="{{asset('storage/images/news')}}/{{$news->image}}" />
                    <label for="">Image</label>
                    <input class="file" type="file" name="image" id="image" data-preview-file-type="text">
                    <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                </div>
                <div class="form-group">
                    @if($news->file)
                        <p>File URL: <a href="{{asset('storage/files/news')}}/{{$news->file}}">{{asset('storage/files/news')}}/{{$news->file}}</a></p>
                    @else
                        <p> File URL : - </p>
                    @endif
                    <label for="">File</label>
                    <input class="file" type="file" name="file" id="file" data-preview-file-type="text">
                </div>
                <div class="form-group">
                    <label for="title">Detail</label>
                    <textarea id="detail" name="detail">
                    {!!$news->detail ?? ''!!}
                    </textarea>
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
<script src="{{ asset('vendor/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('js/validator.js')}}"></script>
<script>
    $("#detail").summernote({
        placeholder: 'Detail...',
                height: 500,
                callbacks: {
                onImageUpload : function(files, editor, welEditable) {
                    sendFile(files[0], this);
                }
            }
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            }
        });
        function sendFile(file, el) {
        var form_data = new FormData();
        form_data.append('file', file);
        var CSRF_TOKEN = $('input[name="_token"]').attr('value');

        $.ajax({
            type: 'post',
            url: "{{url('backend/news/upload/image')}}",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(results) {
                $(el).summernote('editor.insertImage', results);
            }
        });
        };
        $('#form-validate').validator().on('submit', function (e) {
            if (e.isDefaultPrevented()) {
                // handle the invalid form...
            } else {
                // everything looks good!
            }
        });
        var now_type = $( "#type" ).val();
        if(now_type == 1){
            $('#activity_category').addClass('hidden');
            $('#category').val("");
        }
        $( "#type" ).change(function() {
           var type = $(this).val();
           if(type == '2'){
                $('#activity_category').removeClass('hidden');
           }else{
                $('#activity_category').addClass('hidden');
                $('#category').val("");
           }
        });
</script>
@stop