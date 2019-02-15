<section class="container-fluid relate-news">
    <div class="container">
        <div class="row">
            <div class="col-10 offset-1">
                <h1 class="text-center">โครงการ</h1>
                <div class="dash"></div>
                <p class="intro text-center">มูลนิธิแก้ไขปัญหาการดื่มแอลกอฮอล์ ได้จัดกิจกรรม โครงการฝึกอบรมต่างๆ เพื่อลดผลกระทบอันเนื่องมาจากการดื่ม
                เครื่องดื่มแอลกอฮอล์ ที่สอดคล้องและสนับสนุนเป้าหมายขององค์การอนามัยโลกในการลดการบริโภคเครื่องดื่มแอลกอฮอล์ในทางที่ผิด</p>
            </div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10 mt-4">
                <div class="row news-slide">
                    @foreach($news as $val)
                    <div class="col-12">
                        <div><img class="img-fluid" src="{{asset('storage/images/news/thumb')}}/{{$val->thumb}}"></div>
                        <article class="pl-3 pb-3">
                            <p>โครงการ</p>
                            <div></div>
                            <p>{{$val->title}}</p>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</section>