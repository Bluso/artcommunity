@extends('layouts.app')

@section('title', 'Activities')

@section('content')
<div class="page-news news-detail container">
    @include('news_detail.breadcrumb')
    @foreach($news as $val)
        @if($val->type == '2')
            @include('news_detail.header')
        @endif
        @include('news_detail.content')
        @include('news_detail.footer')   
    @endforeach
</div>
@include('news_detail.relate')
@stop