@extends('layouts.app')

@section('title', 'Home')

@section('content')
    @include('home.banner')
    @if(count($home) != 0)
    <section class="main-intro container">
        <div class="row">
            @foreach($home as $h)
            <div class="col-sm-6 col-lg-4">
                <a class="row" href="{{ $h->url }}">
                    <p class="text-indend">{{ $h->title.' '.$h->keyword }}</p>
                    <div class="col-12">
                        <img class="img-fluid" src="{{asset('storage/images/home/thumb')}}/{{$h->thumb}}" alt="{{ $h->title.' '.$h->keyword }}">
                    </div>
                    <article class="col-12 mt-4">
                        <h2 class="text-left">{{ $h->title }}</h2>
                        <p class="text-left">{{ $h->description }}</p>
                    </article>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    @endif
    @include('home.relate_news')
    @include('home.relate_knowledge')
@stop