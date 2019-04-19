<div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="news-tab">
    <div class="container">
        <div class="row block-news">
            @foreach($news as $val)
                @if($val->type == '1')
                <div class="col-12 col-sm-6 col-lg-3 mb-4">
                    <a href="{{url('news/detail')}}/{{$val->id}}">
                        <img class="img-fluid w-100" src="{{asset('storage/images/news/thumb')}}/{{$val->thumb}}" alt="{{$val->seo}}" />
                        <p class="title mt-4">{{$val->title}}</p>
                        <p class="description">
                            {{$val->description}}
                        </p>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @include('news.viewmore')
</div>