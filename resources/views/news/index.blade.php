@extends('layouts.app')

@section('title', 'Activities')

@section('content')
<div class="page-news contaner-fluid">
    @include('banner.index')
    @include('news.tab')
    <div class="tab-content">
        @include('news.news')
        @include('news.activities')
    <div>
</div>
@stop