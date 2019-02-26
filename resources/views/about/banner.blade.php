@if(count($banner) != 0)
<section class=" container-fluid">
    <div class="banner-block row h-auto">
    @foreach($banner as $val)
        <div class="col-12 h-auto">
            <div class="container-fluid mx-auto">
                <img class="img-fluid mx-auto" src="{{asset('storage/images/banner')}}/{{$val->image}}" title="{{ $val->title }}" alt="{{ $val->seo }}">
            </div>
        </div>
        <!--/slide-->
    @endforeach
    </div>
    <!--/banner-block-->
</section>
@endif