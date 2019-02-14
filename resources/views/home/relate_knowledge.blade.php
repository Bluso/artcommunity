<section class="container relate_knowledge">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">บทความและงานวิจัย</h1>
            <div class="dash"></div>
        </div>
    </div>
    <div class="row">
        @foreach($knowledge as $val)
            <div class="col-3">
                <a href="{{asset('storage/images/knowledge/pdf')}}/{{$val->file}}">
                    <img class="img-fluid" src="{{asset('storage/images/knowledge/thumb')}}/{{$val->thumb}}">
                </a>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-2 offset-5">
            <a class="text-center btn btn-outline-warning">บทความทั้งหมด</a>
        </div>
    </div>
</section>