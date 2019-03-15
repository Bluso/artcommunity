<div class="row header mt-5">
    <div class="col-10 offset-2">
        <div class="row">
            <div class="col-3">
                <img class="img-fluid" src="{{asset('storage/images/cate_news')}}/{{$val->cate->thumb}}" alt="{{$val->cate->seo}}"/> 
            </div>
            <div class="col-9">
                <h2>{{$val->title}}</h2>
                <p class="txt-date">{{$val->created_at}}</p>
            </div>
        </div>
    </div>
</div>