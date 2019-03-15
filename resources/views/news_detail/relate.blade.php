@if(count($news) != 0)
<section class="container-fluid relate-news">
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <h2 class="text-center">โครงการอื่นๆ</h2>
                <div class="dash"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <div class="row news-slide">
                    @foreach($activities as $val)
                    <a href="{{url('news/detail')}}/{{$val->id}}" class="col-4 activity-block">
                        <p class="text-indend position-absolute">{{$val->title}}</p>
                        <p class="text-indend position-absolute">{{$val->description}}</p>
                        <p class="text-indend position-absolute">{{$val->seo}}</p>
                        <div><img class="img-fluid w-100" src="{{asset('storage/images/news/thumb')}}/{{$val->thumb}}" alt="{{$val->seo}}"></div>
                        <article class="pl-3 pb-3">
                            <p>โครงการ</p>
                            <div></div>
                            <p class="des">{{$val->title}}</p>
                            <img src="{{asset('storage/images/cate_news')}}/{{$val->cate->thumb}}" alt="{{$val->cate->seo}}">
                        </article>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
