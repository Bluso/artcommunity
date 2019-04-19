<nav class="container">
    <div class="row my-2">
        <div class="col-12">
            <h1 class="text-indend">{{$logo->title_th}} {{$logo->title_en}}</h1>
            <a class="float-left" href="{{url('/')}}"><img class="img-fluid" src="{{asset('storage/images/home/logo')}}/{{$logo->logo}}" alt="{{$logo->title_th}} {{$logo->title_en}}"/></a>
            <div class="float-left mx-3">
                @if(!empty($logo->img_title_th))
                    <h2 class="my-1"><img class="img-fluid" src="{{asset('storage/images/home/image_title')}}/{{$logo->img_title_th}}" alt="{{$logo->title_th}} {{$logo->title_en}}"/></h2>
                @else
                    <h3 class="title_th">{{$logo->title_th}}</h3>
                @endif
                <h3>{{$logo->title_en}}</h3>
            </div>
        </div>
    </div>
</nav>
<nav class="py-3 bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-11">
                <ul class="list-unstyled w-100">
                    <li class="mr-4 float-left"><a href="{{ url('/') }}">หน้าแรก</a></li>
                    <li class="mr-4 float-left"><a href="{{ url('about') }}">เกี่ยวกับเรา</a></li>
                    <li class="mr-4 float-left"><a href="{{ url('news') }}">กิจกรรมและข่าวสาร</a></li>
                    <li class="mr-4 float-left"><a href="{{ url('laws') }}">กฏหมายที่เกี่ยวข้อง</a></li>
                    <li class="mr-4 float-left"><a href="{{ url('knowledge') }}">บทความงานวิจัย</a></li>
                    <li class="float-left"><a href="{{ url('contact') }}">ติดต่อเรา</a></li>
                </ul>
            </div>
            <div class="col-1 d-none">
                <a class="d-block"><img class="img-fluid" src="{{ asset('images/facebook_icon.png') }}" alt="มูลนิธิแก้ไขปัญหาการดื่มแอลกอฮอล์ (มปอ.)" /></a>
            </div>
        </div>
    </div>
</nav>