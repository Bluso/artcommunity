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

@section('content')
<section class="main-intro box">
        <div class="row">
            <div class="col-xs-12"><h3 class="text-center">All content on home page</h3></div>
            @foreach($home as $h)
            <div class="col-xs-4">
                <div class="col-xs-12"><a type="button" class="btn btn-warning col-xs-12" href="{{url('backend/home/edit/'.$h->id)}}">Edit</a></div>
                <a class="row" href="{{ url($h->url) }}">
                    <div class="col-xs-12">
                        <img class="img-responsive text-center center-block" src="{{asset('storage/images/home/thumb')}}/{{$h->thumb}}">
                    </div>
                    <article class="col-xs-12 mt-4">
                        <h2 class="text-center">{{ $h->title }}</h2>
                        <p class="text-center">{{ $h->description }}</p>
                    </article>
                </a>
            </div>
            @endforeach
        </div>
    </section>
@stop