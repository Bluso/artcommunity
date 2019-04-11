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
            <h3 class="box-title">Add News</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/news/add', 'method' => 'post','enctype' => 'multipart/form-data','id'=>'form-validate','data-toggle'=>'validator','role'=>'form')) }}
        {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="category">Type Category</label>
                    <select class="form-control" name="type" id="type" data-error="กรุณาเลือกประเภทของบทความ" required>
                        <option value="">Select type category</option>
                        @foreach(config('content.type') as $key => $c)
                            <option value="{{$key}}">{{$c}}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div id="activity_category" class="form-group hidden">
                    <label for="category">Category</label>
                    <select class="form-control" name="cate_id" id="category" data-error="กรุณาเลือกหมวดหมู่ของข่าว">
                        <option value="">Select news category</option>
                        @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->title}}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                @if($category->count() == 0)
                <div id="addcate" class="form-group hidden">
                    <p class="addcate text-danger">ตอนนี้ยังไม่มีหมวดหมู่ของข่าว คลิก "+ Add New Category" เพื่อสร้าง Category</p>
                    <a href="/backend/news/cate/add" id="addcatebtn" class="addcate btn btn-primary" data-disable="true">+ Add New Category</a>
                </div>
                @endif
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Enter title of news" data-error="กรุณากรอกชื่อข่าว" maxlength="255" required>
                    <p class="help-block">Maximum character is 255</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <input name="description" type="text" class="form-control" id="description" placeholder="Enter title of description" data-error="กรุณากรอกคำอธิบาย" maxlength="255" required>
                    <p class="help-block">Maximum character is 255</p>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input name="keywords" type="text" class="form-control" id="keyword" placeholder="images,banner,tfrd,มปอ,...">
                </div>
                <div class="form-group">
                    <label style="width:100%" for="">Thumb</label>
                    <input class="file" type="file" name="thumb" id="thumb" data-preview-file-type="text" required>
                    <p class="help-block">Image type of png,jpg and max size is 2MB. * Dimensions: 260*260 px</p>
                </div>
                <div class="form-group">
                    <label for="">Image</label>
                    <input class="file" type="file" name="image" id="image" data-preview-file-type="text" required>
                    <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                </div>
                <div class="form-group">
                    <label for="">File</label>
                    <input class="file" type="file" name="file" id="file" data-preview-file-type="text">
                </div>
                <div class="form-group">
                    <label for="title">Detail</label>
                    <textarea id="detail" name="detail" placeholder="Enter text ..." style="styles to copy to the iframe"></textarea>
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
        if(now_type == 2){
            $('#addcate').removeClass('hidden');
        }
        $( "#type" ).change(function() {
           var type = $(this).val();
           if(type == '2'){
                $('#activity_category').removeClass('hidden');
                $('#addcate').removeClass('hidden');
                $('#category').prop('required',true);
           }else{
                $('#activity_category').addClass('hidden');
                $('#addcate').addClass('hidden');
                $('#category').val("");
                $('#category').prop('required',false);
           }
        });
</script>
@include('backend.layouts.js_fileinput')
@stop
