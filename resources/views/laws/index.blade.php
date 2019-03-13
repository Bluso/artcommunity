@extends('layouts.app')

@section('title', 'Activities')

@section('content')
<div class="page-laws contaner-fluid">
    @include('banner.index')
    @include('laws.content')
</div>
@stop

@push('js')
<script>
    $('.accordion').collapse()
    $('#accordionExample').on('hidden.bs.collapse', toggleIcon);
    $('#accordionExample').on('shown.bs.collapse', toggleIcon);
    
    function toggleIcon(e) {
        console.log('dddddddddddd');
        $(e.target)
            .prev('.btn-link')
            .find(".more-less")
            .toggleClass('fa fa-angle-down');
    }
    
</script>
@endpush