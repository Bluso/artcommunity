@if(count($knowledge) != 0)
<section class="container relate_knowledge">
    <div class="row">
        <div class="col-12">
            <h2 class="text-center">ความรู้และงานวิจัย</h2>
            <div class="dash"></div>
        </div>
    </div>
    <div class="row">
        @foreach($knowledge as $val)
            <div class="col-3">
                <p class="text-indend">{{$val->title}}</p>
                <p class="text-indend">{{$val->description}}</p>
                <p class="text-indend">{{$val->seo}}</p>
                <a href="{{asset('storage/images/knowledge/pdf')}}/{{$val->file}}">
                    <img class="img-fluid" src="{{asset('storage/images/knowledge/thumb')}}/{{$val->thumb}}" alt="{{$val->seo}}">
                </a>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-2 offset-5">
            <a class="text-center btn btn-outline-warning">กิจกรรมทั้งหมด</a>
        </div>
    </div>
</section>
@endif