<div class="row mt-5 content-detail">
    <div class="col-10 offset-2">
        <div class="row">
            <div class="col-12 text-center">
                <img class="mx-auto img-fluid" src="{{asset('storage/images/news')}}/{{$val->image}}" alt="{{$val->seo}}"/>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                {!! $val->detail !!}
            </div>
        </div>
    </div>
</div>