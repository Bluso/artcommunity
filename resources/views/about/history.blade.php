@if(!empty($history))
<section class="history py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center">ความเป็นมา</h2>        
                <div class="dash"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-indend">{{$history->seo}}</p>
                <img class="img-responsive" src="{{asset('storage/images/about/history')}}/{{$history->image}}" alt="{{$history->seo}}" />
            </div>
            <div class="col-12 mt-5 data-block">
                {!! $history->detail !!}
            </div>
        </div>
    </div>
</section>
@endif