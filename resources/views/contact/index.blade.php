@extends('layouts.app')

@section('title', 'Activities')

@section('content')
<div id="page-name" data-page="contact" class="page-laws contaner-fluid">
    @include('banner.index')
    @include('contact.content')
</div>
@stop