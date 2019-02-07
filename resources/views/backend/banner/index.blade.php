@extends('adminlte::page')

@section('title', 'TFRD')

@section('content_header')
<h1>
    Banner
    <small>Home banner</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Banner</li>
</ol>
@stop

@section('content')
<div class="box">
    <div class="box-header">
        <h3 class="box-title">Banner</h3>
        <div class="pull-right"><a class="d-block btn btn-info" href="{{url('backend/banner/add')}}"><i class="fa fa-plus-square"></i> Add Banner</a></div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <table id="banner-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" style="width: 283px;">Title</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 359px;">Image</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 320px;">Created at</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 243px;">Updated at</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" style="width: 176px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banner as $key => $n)
                        <tr role="row" class="odd">
                            <td class="sorting_1">
                            <dl>
                                <dt>Title</dt>
                                <dd>{{ $n->title }}</dd>
                                <dt>Keywords</dt>
                                <dd>{{ $n->keywords }}</dd>
                                <dt>Description</dt>
                                <dd>{{ $n->description }}</dd>
                            </dl>
                            </td>
                            <td><img style="width:200px;" src="{{asset('storage/images/banner')}}/{{$n->images}}" /></td>
                            <td>{{ $n->created_at }}</td>
                            <td>{{ $n->updated_at }}</td>
                            <td>
                                <a type="button" class="btn btn-warning" href="{{url('backend/banner/edit/'.$n->id)}}" >Edit</a>
                                <a type="button" class="btn btn-danger" href="{{url('backend/banner/delete/'.$n->id)}}">Delete</a>
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
    $('#banner-table').DataTable({
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