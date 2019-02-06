@extends('adminlte::page')

@section('title', 'TFRD')

@section('content_header')
    <h1 class="pull-left">News and activities</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/news/add')}}"><i class="fa fa-plus-square"></i> Add News</a></div>
@stop

@section('content')
    <div></div>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">thumb</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($news as $key => $bn)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <b>Title: {{ $news->title }}</b><br>
                    <small>Description: {{ $news->description }}<small>
                    <small>Keywords: {{ $news->keywords }}<small>
                </td>
                <td><img style="width:200px;" src="{{asset('storage/images/news')}}/{{$news->thumb}}" /></td>
                <td>{{ $news->created_at }}</td>
                <td>{{ $news->updated_at }}</td>
                <td>
                    <a type="button" class="btn btn-warning" href="{{url('backend/banner/edit/'.$bn->id)}}" >Edit</a>
                    <a type="button" class="btn btn-danger" href="{{url('backend/banner/delete/'.$bn->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop