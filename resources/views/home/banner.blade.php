<section class=" container-fluid">
    <div class="banner-block row h-auto">
    @foreach($banner as $val)
        <div class="col-12 h-auto">
            <div class="container-fluid mx-auto">
                <img class="img-fluid mx-auto" src="{{asset('storage/images/banner')}}/{{$val->image}}" title="{{ $val->title }}" alt="{{ $val->seo }}">
            </div>
            <div class="container-fluid position-absolute fixed-bottom">
                <div class="container caption">
                    <div class="col-6 offset-1">
                        <h1>{{ $val->title }}</h1>
                        <div class="dash-banner"></div>
                        <p>
                            {{ $val->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <!--/slide-->
    </div>
    <!--/banner-block-->
</section>