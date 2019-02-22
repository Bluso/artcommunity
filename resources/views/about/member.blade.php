@if(count($member) != 0)
<section class="member py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">คณะกรรมการบริหาร</h1>        
                <div class="dash"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-10 offset-1">
                <div class="row">
                    @foreach($member as $mem)
                    <div class="col-4">
                        <img class="rounded-circle img-fluid d-block mx-auto img-thumbnail" src="{{asset('storage/images/about/member')}}/{{$mem->image}}" />
                        <p class="text-center mt-3">{{ $mem->name }}</p>
                        <p class="text-center">{{ $mem->position }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif