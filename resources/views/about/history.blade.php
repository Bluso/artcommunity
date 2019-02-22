@if(count($history) != 0)
<section class="history py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">ความเป็นมา</h1>        
                <div class="dash"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <img class="img-responsive" src="{{asset('storage/images/about/history')}}/{{$history->image}}" />
            </div>
            <div class="col-12 mt-5 data-block">
                {!! $history->detail !!}
            </div>
        </div>
    </div>
</section>
@endif