<nav class="navbar navbar-expand-lg navbar-light d-md-none">
  <img class="img-fluid" src="{{asset('storage/images/home/logo')}}/{{$logo->logo}}" alt="{{$logo->title_th}} {{$logo->title_en}}"/>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    @if(!empty($logo->img_title_th))
        <h2 class="my-1 w-100"><img class="img-fluid" src="{{asset('storage/images/home/image_title')}}/{{$logo->img_title_th}}" alt="{{$logo->title_th}} {{$logo->title_en}}"/></h2>
    @else
        <h3 class="title_th w-100">{{$logo->title_th}}</h3>
    @endif
    <h3 class="w-100">{{$logo->title_en}}</h3>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul id="menu-bar" class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link p-home" href="{{ url('/') }}">หน้าแรก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-about" href="{{ url('about') }}">เกี่ยวกับเรา</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-news" href="{{ url('news') }}">ข่าวสารและกิจกรรม</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-laws" href="{{ url('laws') }}">กฏหมายที่เกี่ยวข้อง</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-knowledge" href="{{ url('knowledge') }}">บทความงานวิจัย</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-contact" href="{{ url('contact') }}">ติดต่อเรา</a>
      </li>
    </ul>
  </div>
</nav>

<nav class="container d-none d-md-block">
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
<nav class="py-3 bg-grey d-none d-md-block">
    <div class="container">
        <div class="row">
            <div class="col-11">
                <ul id="menu-bar" class="list-unstyled w-100">
                    <li class="mr-4 float-left"><a class="p-home" href="{{ url('/') }}">หน้าแรก</a></li>
                    <li class="mr-4 float-left"><a class="p-about" href="{{ url('about') }}">เกี่ยวกับเรา</a></li>
                    <li class="mr-4 float-left"><a class="p-news" href="{{ url('news') }}">ข่าวสารและกิจกรรม</a></li>
                    <li class="mr-4 float-left"><a class="p-laws" href="{{ url('laws') }}">กฏหมายที่เกี่ยวข้อง</a></li>
                    <li class="mr-4 float-left"><a class="p-knowledge" href="{{ url('knowledge') }}">บทความงานวิจัย</a></li>
                    <li class="float-left"><a class="p-contact" href="{{ url('contact') }}">ติดต่อเรา</a></li>
                </ul>
            </div>
            <div class="col-1 d-none">
                <a class="d-block"><img class="img-fluid" src="{{ asset('images/facebook_icon.png') }}" alt="มูลนิธิแก้ไขปัญหาการดื่มแอลกอฮอล์ (มปอ.)" /></a>
            </div>
        </div>
    </div>
</nav>