@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
<link rel="stylesheet" href="{{ asset('css/backend.css')}} ">
@stop
@section('content_header')
<h1>
    News
    <small>News and activities</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">News</a></li>
    <li class="active">News and activities</li>
</ol>
   
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">News and activities</h3>
        <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/news/cate/add')}}"><i class="fa fa-plus-square"></i> Add Category</a></div>
        <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/news/add')}}"><i class="fa fa-plus-square"></i> Add News</a></div>
    
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <table id="news-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">#</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 283px;">Group Category</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 283px;">Title</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 359px;">Thumb</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 359px;">File</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 320px;">Created at</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 243px;">Updated at</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 176px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $key => $n)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                            {{ $key+1 }}
                            </td>
                            <td>{{ config('content.type.'.$n->type) }}</td>
                            <td>
                            <dl>
                                @if($n->cate_id)
                                <dt>Category</dt>
                                <dd>{{ $n->cate->title }}</dd>
                                @endif
                                <dt>Title</dt>
                                <dd>{{ $n->title }}</dd>
                                <dt>Keywords</dt>
                                <dd>{{ $n->keywords }}</dd>
                                <dt>Description</dt>
                                <dd>{{ $n->description }}</dd>
                            </dl>
                            </td>
                            <td><img src="{{asset('storage/images/news/thumb')}}/{{$n->thumb}}" style="max-width: 260px" /></td>
                            @if($n->file)
                            <td><a href="{{asset('storage/files/news')}}/{{$n->file}}" target="_blank">{{asset('storage/files/news')}}/{{$n->file}}</a></td>
                            @else
                            <td></td>
                            @endif
                            <td>{{ $n->created_at }}</td>
                            <td>{{ $n->updated_at }}</td>
                            <td>
                                <a type="button" class="btn btn-warning" href="{{url('backend/news/edit/'.$n->id)}}" >Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$n->id}}">
                                    Delete
                                </button>
                                <div class="modal modal-danger fade" id="modal-delete-{{$n->id}}" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete News</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>ต้องการลบข่าวนี้ใช่หรือไม่ ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a type="button" class="btn btn-outline" href="{{url('backend/news/delete/'.$n->id)}}">Confirm</a>
                                        </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th rowspan="1" colspan="1">#</th>
                            <th rowspan="1" colspan="1">Group Category</th>
                            <th rowspan="1" colspan="1">Title</th>
                            <th rowspan="1" colspan="1">Thumb</th>
                            <th rowspan="1" colspan="1">File</th>
                            <th rowspan="1" colspan="1">Created at</th>
                            <th rowspan="1" colspan="1">Updated at</th>
                            <th rowspan="1" colspan="1">Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- /.box-body -->
</div>
@stop

@section('js')
<script>
  $(function () {
    $('#news-table').DataTable({
      "order": [[ 0, 'desc' ]],
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  });
</script>
@stop