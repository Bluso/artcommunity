@extends('layouts.app')

@section('title', 'Knowledge')

@section('content')
<div id="page-name" data-page="knowledge" class="page-knowledge contaner-fluid">
    @include('banner.index')
    @include('knowledge.content')
    @include('knowledge.viewmore')
    @include('knowledge.youtube')
    
</div>
@stop
