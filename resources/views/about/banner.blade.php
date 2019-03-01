@if(count($banner) != 0)
<section class="banner container-fluid">
    <div class="banner-block row h-auto">
    @foreach($banner as $val)
        <div class="col-12 h-auto position-relative p-0 m-0">
            <p class="text-indend position-absolute">{{ $val->title.' '.$val->seo }}</p>
            <h2 class="position-absolute text-center">เกี่ยวกับเรา</h2>
            <div class="container-fluid mx-auto p-0 m-0">
                <img class="img-fluid mx-auto p-0 m-0 w-100" src="{{asset('storage/images/banner')}}/{{$val->image}}" title="{{ $val->title }}" alt="{{ $val->seo }}">
            </div>
        </div>
        <!--/slide-->
    @endforeach
    </div>
    <!--/banner-block-->
</section>
@endif