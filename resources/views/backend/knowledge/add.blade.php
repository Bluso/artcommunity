@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
<link rel="stylesheet" href="{{ asset('css/image_preview.css')}}">
<link rel="stylesheet" href="{{ asset('vendor/summernote/summernote-bs4.css') }}">
<link  rel="stylesheet" src="{{ asset('vendor/bootstrap-fileinput/fileinput.min.css') }}">
@stop
@section('content_header')
<h1 class="pull-left">Knowledge</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/knowledge')}}"><i class="fa fa-undo"></i> Back</a></div>
@stop

@section('content')
<div class="pull-left col-xs-12" style="margin-top:15px;">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Add knowledge</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        {{ Form::open(array('url' => 'backend/knowledge/add', 'method' => 'post','enctype' => 'multipart/form-data')) }}
        {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Enter title of knowledge" required>
                </div>
                <div class="form-group">
                    <label for="title">Description</label>
                    <input name="description" type="text" class="form-control" id="description" placeholder="Enter title of description" required>
                </div>
                <div class="form-group">
                    <label for="keywords">Keywords</label>
                    <input name="keywords" type="text" class="form-control" id="keyword" placeholder="images,banner,tfrd,มปอ,...">
                </div>
                <div class="form-group">
                    <div class="custom-preview" style="width: 300px">
                        <label class="custom-preview-label" for="">PDF Cover</label>
                        <input class="custom-preview-input" type="file" name="thumb" id="thumb" preview="thumb-preview" required>
                    </div>
                    <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                    <div class="preview" id="thumb-preview"></div>
                </div>
                <div class="form-group">
                    <div class="custom-preview" style="width: 300px">
                        <label class="custom-preview-label" for="">Image</label>
                        <input class="custom-preview-input" type="file" name="image" id="image" preview="image-preview" required>
                    </div>
                    <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                    <div class="preview" id="image-preview"></div>
                </div>
                <!--
                <div class="form-group">
                    <label for="">File Pdf</label>
                    <input class="file" type="file" name="file" id="file" data-preview-file-type="text" >
                    <p class="help-block">File type of pdf.</p>
                </div>
-->
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
<script src="{{ asset('js/image_preview.js') }}"></script>
<script src="{{ asset('vendor/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/purify.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/purify.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fa/theme.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/th.js') }}"></script>
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
            url: "{{url('backend/knowledge/upload/image')}}",
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(results) {
                $(el).summernote('editor.insertImage', results);
            }
        });
        };
        $("#file").fileinput({'showUpload':false, 'previewFileType':'any'});
</script>
@stop