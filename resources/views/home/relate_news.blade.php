@if(count($news) != 0)
<section class="container-fluid relate-news">
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <h2 class="text-center">กิจกรรมและโครงการ</h2>
                <div class="dash"></div>
                <p class="intro text-center">มูลนิธิแก้ไขปัญหาการดื่มแอลกอฮอล์ ได้จัดกิจกรรม โครงการฝึกอบรมต่างๆ เพื่อลดผลกระทบอันเนื่องมาจากการดื่ม
                เครื่องดื่มแอลกอฮอล์ ที่สอดคล้องและสนับสนุนเป้าหมายขององค์การอนามัยโลกในการลดการบริโภคเครื่องดื่มแอลกอฮอล์ในทางที่ผิด</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-4">
                <div class="row news-slide">
                    @foreach($news as $val)
                    <a href="{{url('news/detail')}}/{{$val->id}}" class="col-3 activity-block">
                        <p class="text-indend">{{$val->title}}</p>
                        <p class="text-indend">{{$val->description}}</p>
                        <p class="text-indend">{{$val->seo}}</p>
                        <div><img class="img-fluid" src="{{asset('storage/images/news/thumb')}}/{{$val->thumb}}" alt="{{$val->seo}}"></div>
                        <article class="pl-3 pb-3">
                            <p>โครงการ</p>
                            <div></div>
                            <p class="des">{{$val->title}}</p>
                            <img src="{{asset('storage/images/cate_news')}}/{{$val->cate->thumb}}" alt="{{$val->cate->seo}}">
                        </article>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-2 offset-5">
                <a href="{{ url('news') }}"  class="text-center btn btn-outline-warning">กิจกรรมทั้งหมด</a>
            </div>
        </div>
    </div>
</section>
@endif
