@if(count($banner) != 0)
<section class="banner container-fluid">
    <div class="banner-block row h-auto">
    @foreach($banner as $val)
        <div class="col-12 h-auto p-0 m-0">
            <div class="container-fluid mx-auto p-0 m-0">
                <p class="text-indend position-absolute">{{$val->seo}}</p>
                <div class="dark-overlay">
                    <img class="img-fluid mx-auto w-100 p-0 m-0" src="{{asset('storage/images/banner')}}/{{$val->image}}" title="{{ $val->title }}" alt="{{ $val->seo }}">
                </div>
            </div>
            <div class="container-fluid position-absolute fixed-bottom">
                <div class="container caption">
                    <div class="col-10 offset-1">
                        <h2 class="banner-font-sm">{{ $val->title }}</h2>
                        <div class="dash-banner d-none"></div>
                        <p class="d-none">
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
@endif
