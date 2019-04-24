<div class="row mt-5 content-detail">
    <div class="col-lg-10 offset-lg-2">
        <div class="row">
            <div class="col-12 text-center">
                <img class="mx-auto" src="{{asset('storage/images/news')}}/{{$val->image}}" alt="{{$val->seo}}"/>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                {!! $val->detail !!}
            </div>
        </div>
    </div>
</div>
