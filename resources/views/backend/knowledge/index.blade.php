@extends('adminlte::page')

@section('title', 'TFRD')
@section('css')
<link rel="stylesheet" href="{{ asset('css/backend.css')}} ">
@stop
@section('content_header')
<h1>
    Knowledge
    <small>content and file</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Knowledge</a></li>
</ol>
   
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">kKnowledge</h3>
        <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/knowledge/add')}}"><i class="fa fa-plus-square"></i> Add Knowledge</a></div>
        <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/knowledge/cate/add')}}"><i class="fa fa-plus-square"></i> Add Category</a></div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <table id="knowledge-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_desc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">#</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 283px;">Title</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 359px;">PDF Cover</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 320px;">Created at</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 243px;">Updated at</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 176px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($knowledge as $key => $n)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                            {{ $key+1 }}
                            </td>
                            <td>
                            <dl>
                                <dt>Category</dt>
                                <dd>{{ $n->cate->title }}</dd>
                                <dt>Title</dt>
                                <dd>{{ $n->title }}</dd>
                                <dt>Keywords</dt>
                                <dd>{{ $n->keywords }}</dd>
                                <dt>Description</dt>
                                <dd>{{ $n->description }}</dd>
                                <dt>Pdf URL</dt>
                                <dd><a href="{{asset('storage/images/knowledge/pdf')}}/{{$n->file}}">{{asset('storage/images/knowledge/pdf')}}/{{$n->file}}</a></dd>
                            </dl>
                            </td>
                            <td><img style="max-width:100%; width:200px;" src="{{asset('storage/images/knowledge/thumb')}}/{{$n->thumb}}" /></td>
                            <td>{{ $n->created_at }}</td>
                            <td>{{ $n->updated_at }}</td>
                            <td>
                                <a type="button" class="btn btn-warning" href="{{url('backend/knowledge/edit/'.$n->id)}}" >Edit</a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-{{$n->id}}">
                                    Delete
                                </button>
                                <div class="modal modal-danger fade" id="modal-delete-{{$n->id}}" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete knowledge</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>ต้องการลบข่าวนี้ใช่หรือไม่ ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a type="button" class="btn btn-outline" href="{{url('backend/knowledge/delete/'.$n->id)}}">Confirm</a>
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
                            <th rowspan="1" colspan="1">Title</th>
                            <th rowspan="1" colspan="1">Thumb</th>
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
    $('#knowledge-table').DataTable({
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