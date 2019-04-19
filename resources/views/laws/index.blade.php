@extends('layouts.app')

@section('title', 'Activities')

@section('content')
<div class="page-laws contaner-fluid">
    @include('banner.index')
    @if(count($lawscontent) > 0)
        @include('laws.content')
    @else
        @include('laws.empty_content')
    @endif
</div>
@stop
