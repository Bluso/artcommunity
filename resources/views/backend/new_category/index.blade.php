@extends('adminlte::page')

@section('title', 'TFRD')

@section('content_header')
    <h1 class="pull-left">Categorires of News</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/news/cate/add')}}"><i class="fa fa-plus-square"></i> Add Category</a></div>
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
        @foreach($news as $key => $n)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>
                    <b>Title: {{ $n->title }}</b><br>
                    <small>Description: {{ $n->description }}<small><br>
                    <small>Keywords: {{ $n->keywords }}<small>
                </td>
                <td><img style="width:200px;" src="{{asset('storage/images/cate_news')}}/{{$n->thumb}}" /></td>
                <td>{{ $n->created_at }}</td>
                <td>{{ $n->updated_at }}</td>
                <td>
                    <a type="button" class="btn btn-warning" href="{{url('backend/news/cate/edit/'.$n->id)}}" >Edit</a>
                    <a type="button" class="btn btn-danger" href="{{url('backend/news/cate/delete/'.$n->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop