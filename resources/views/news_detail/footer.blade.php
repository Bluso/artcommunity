<div class="row">
    <div class="col-lg-10 offset-lg-2">
        <hr>
        @if($val->file)
        <a href="{{asset('storage/files/news')}}/{{$val->file}}" class="col-4 float-right btn btn-outline-warning mt-3 py-2">
            <i class="fa fa-download"></i> ดาวโหลดเอกสาร
        </a>
        @endif
    </div>
</div>
