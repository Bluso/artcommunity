@extends('layouts.app')

@section('title', 'Knowledge')

@section('content')
<div class="page-knowledge contaner-fluid">
    @include('banner.index')
    @include('knowledge.content')
</div>
@stop