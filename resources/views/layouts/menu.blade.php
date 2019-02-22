<nav class="container">
    <div class="row my-2">
        <div class="col-2">
            <a href="{{url('/')}}"><img class="img-fluid" src="{{ asset('images/logo_mop.png') }}"/></a>
        </div>
        <div class="col-9">
            <ul class="list-unstyled row position-absolute w-100">
                <li class="mr-4"><a href="{{ url('about') }}">เกี่ยวกับเรา</a></li>
                <li class="mr-4"><a href="{{ url('news') }}">กิจกรรมและข่าวสาร</a></li>
                <li class="mr-4"><a href="{{ url('law') }}">กฏหมายที่เกี่ยวข้อง</a></li>
                <li class="mr-4"><a href="{{ url('knowledge') }}">บทความงานวิจัย</a></li>
                <li><a href="{{ url('contact') }}">ติดต่อเรา</a></li>
            </ul>
        </div>
        <div class="col-1">
            <a class="d-block"><img class="img-fluid mt-2" src="{{ asset('images/facebook_icon.png') }}"/></a>
        </div>
    </div>
</nav>