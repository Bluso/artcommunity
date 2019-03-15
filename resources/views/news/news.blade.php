<div class="tab-pane fade show active" id="news" role="tabpanel" aria-labelledby="news-tab">
    <div class="container">
        <div class="row block-news">
            @foreach($news as $val)
                @if($val->type == '1')
                <div class="col-3 mb-4">
                    <img class="img-fluid w-100" src="{{asset('storage/images/news/thumb')}}/{{$val->thumb}}" alt="{{$val->seo}}" />
                    <p class="title mt-4">{{$val->title}}</p>
                    <p class="description">
                        {{$val->description}}
                    </p>
                </div>
                @endif
            @endforeach
        </div>
    </div>
    @include('news.viewmore')
</div>