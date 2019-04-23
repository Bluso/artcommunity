@if(count($banner) != 0)
<section class="banner container-fluid">
    <div class="banner-block row h-auto">
    @foreach($banner as $val)
        <div class="col-12 h-auto p-0 m-0">
            <div class="container-fluid mx-auto p-0 m-0">
                <p class="text-indend position-absolute">{{$val->seo}}</p>
              <div class="dark-overlay d-block d-md-none">
                <img class="img-fluid mx-auto p-0 m-0 w-100" src="{{asset('storage/images/banner')}}/{{$val->image_mobile}}" title="{{ $val->title }}" alt="{{ $val->seo }}">
              </div>
              <div class="dark-overlay d-none d-md-block">
                <img class="img-fluid mx-auto w-100 p-0 m-0" src="{{asset('storage/images/banner')}}/{{$val->image}}" title="{{ $val->title }}" alt="{{ $val->seo }}">
              </div>
            </div>
            <div class="container-fluid position-absolute fixed-bottom">
                <div class="container caption">
                    <div class="col-12 col-lg-10 offset-lg-1 offset-0">
                        <h2 class="h2-font">{{ $val->title }}</h2>
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
