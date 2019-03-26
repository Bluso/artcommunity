<div class="tab-pane fade" id="activities" role="tabpanel" aria-labelledby="activities-tab">
    <div class="container">
        <div class="row categories">
            @foreach($cate as $val)
                @if($val->type == '2')
                    <div class="col-3 mb-4">
                        <a class="d-block border"><img class="img-fluid" src="{{asset('storage/images/cate_news')}}/{{$val->thumb}}" alt="{{$val->seo}}" /></a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class="row">
            @foreach($news as $val)
                @if($val->type == '2')
                    <a href="{{url('news/detail')}}/{{$val->id}}" class="col-4 activity-block">
                        <p class="text-indend">{{$val->title}}</p>
                        <p class="text-indend">{{$val->description}}</p>
                        <p class="text-indend">{{$val->seo}}</p>
                        <div><img class="img-fluid w-100" src="{{asset('storage/images/news/thumb')}}/{{$val->thumb}}" alt="{{$val->seo}}"></div>
                        <article class="pl-3 pb-3">
                            <p>โครงการ</p>
                            <div></div>
                            <p class="des col-9">{{$val->title}}</p>
                            <img src="{{asset('storage/images/cate_news')}}/{{$val->cate->thumb}}" alt="{{$val->cate->seo}}">
                        </article>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
    @include('news.viewmore')
</div>
