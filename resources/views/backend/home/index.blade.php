@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
    @include('backend.layouts.css_fileinput')
@stop
@section('content_header')
<h1>
Home Page
</h1>
<ol class="breadcrumb">
    <li class="active"><i class="fa fa-dashboard"></i> Home</li>
</ol>
@stop

@section('content')
<section class="main-intro box">
        <div class="row">
            <div class="col-xs-12"><h3 class="text-center">Logo Menu</h3></div>
            <div class="col-xs-12">
                {{ Form::open(array('url' => 'backend/home/logo/save', 'method' => 'post','enctype' => 'multipart/form-data','id'=>'form-validate','data-toggle'=>'validator','role'=>'form')) }}
                  {{csrf_field()}}
                  <div class="box-body">
                      <div class="form-group">
                          <label for="">Logo</label><br />
                          @if(!empty($logo->logo))
                              <img style="margin-bottom:15px;max-width:200px;border: solid thin #ddd;" src="{{asset('storage/images/home/logo')}}/{{$logo->logo}}" />
                              <input class="file" type="file" name="logo" id="thumb" data-preview-file-type="text" data-error="กรุณาเลือกภาพ Logo">
                          @else
                              <input class="file" type="file" name="logo" id="thumb" data-preview-file-type="text" data-error="กรุณาเลือกภาพ Logo" required>
                          @endif
                          <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                      </div>
                      <div class="form-group">
                        <label for="">Title Thai Language</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                          <input type="text" class="form-control" name="title_th" placeholder="Title Thai Language"  value="{!! $logo->title_th ?? '' !!}" data-error="กรุณากรอกชื่อภาษาไทย" maxlength="255" required>
                        </div>
                        <p class="help-block">Maximum character is 255</p>
                        <div class="help-block with-errors"></div>
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="">Title English Language</label>
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                          <input type="text" class="form-control" name="title_en" placeholder="Title Thai Language"  value="{!! $logo->title_en ?? '' !!}" data-error="กรุณากรอกชื่อภาษาอังกฤษ" maxlength="255" required>
                        </div>
                        <p class="help-block">Maximum character is 255</p>
                        <div class="help-block with-errors"></div>
                      </div>
                      <br />
                      <div class="form-group">
                          <label for="">Image Title Thai Language</label><br />
                          @if(!empty($logo->img_title_th))
                              <img style="margin-bottom:15px;max-width:200px;border: solid thin #ddd;" src="{{asset('storage/images/home/image_title')}}/{{$logo->img_title_th}}" />
                          @endif
                          <input class="file" type="file" name="image_title" id="image" data-preview-file-type="text">
                          <p class="help-block">Image type of png,jpg and max size is 2MB.</p>
                      </div>
                      <button type="submit" class="btn bg-olive btn-flat">Save Logo Menu Data</button>
                  </div>
              {{ Form::close() }}
          </div>
      </div>
</section>

<section class="main-intro box">
        <div class="row">
            <div class="col-xs-12"><h3 class="text-center">All content on home page</h3></div>
            @foreach($home as $h)
            <div class="col-xs-4">
                <div class="col-xs-12" style="margin-bottom:15px;"><a type="button" class="btn btn-warning col-xs-12" href="{{url('backend/home/edit/'.$h->id)}}">Edit</a></div>
                    <div class="col-xs-12">
                        <img class="img-fluid text-center center-block" src="{{asset('storage/images/home/thumb')}}/{{$h->thumb}}">
                    </div>
                    <article class="col-xs-12 mt-4">
                        <h2 class="text-center text-dark">{{ $h->title }}</h2>
                        <p class="text-center text-dark">{{ $h->description }}</p>
                        <p class="text-center text-info">URL: {{ $h->url }}</p>
                        <p class="text-center text-info">keywords: {{ $h->keywords }}</p>
                    </article>
            </div>
            @endforeach
        </div>
    </section>
@stop

@section('js')
  <script src="{{ asset('js/validator.js')}}"></script>
  @include('backend.layouts.js_fileinput')
@stop
