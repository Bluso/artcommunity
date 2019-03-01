@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="page-about contaner-fluid">
    @include('about.banner')
    @include('about.history')
    @include('about.mission')
    @include('about.main_mission')
    @include('about.belive')
    @include('about.member')
</div>
@stop