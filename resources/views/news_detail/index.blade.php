@extends('layouts.app')

@section('title', 'Activities')

@section('content')
<div class="page-news container">
    @include('news_detail.breadcrumb')
    @foreach($news as $val)
        @if($val->type == '2')
            @include('news_detail.header')
        @endif
        @include('news_detail.content')
    @endforeach
    @include('news_detail.footer')
    @include('news_detail.relate')
</div>
@stop