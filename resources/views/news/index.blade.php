@extends('layouts.app')

@section('title', 'Activities')

@section('content')
<div id="page-name" data-page="news" class="page-news contaner-fluid">
    @include('banner.index')
    @include('news.tab')
    <div class="tab-content">
        @include('news.news')
        @include('news.activities')
    <div>
</div>
@stop