@extends('adminlte::page')

@section('title', 'TFRD')

@section('content_header')
    <h1 class="pull-left">Banner</h1>
    <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/banner/add')}}"><i class="fa fa-plus-square"></i> Add Banner</a></div>
@stop

@section('content')
    <div></div>
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Created at</th>
                <th scope="col">Updated at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($banner as $key => $bn)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{ $bn->title }}</td>
                <td>{{ $bn->images }}</td>
                <td>{{ $bn->created_at }}</td>
                <td>{{ $bn->updated_at }}</td>
                <td>
                    <a type="button" class="btn btn-warning" href="{{url('backend/banner/edit/'.$bn->id)}}" >Edit</a>
                    <a type="button" class="btn btn-danger" href="{{url('backend/banner/delete/'.$bn->id)}}">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop