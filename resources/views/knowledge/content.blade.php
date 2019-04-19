
 <div class="container content margin-content">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-5 text-center">เอกสารงานวิจัย</h2>
        </div>
        @foreach($knowledge as $val)
            <div class="col-12 col-sm-6 col-lg-3 knowledge_content align-center mb-5">
                <p class="text-indend position-absolute">{{$val->title}}</p>
                <p class="text-indend position-absolute">{{$val->description}}</p>
                <p class="text-indend position-absolute">{{$val->seo}}</p>
                <a href="{{asset('storage/images/knowledge/pdf')}}/{{$val->file}}">
                    <img class="img-fluid" src="{{asset('storage/images/knowledge/thumb')}}/{{$val->thumb}}" alt="{{$val->seo}}">
                </a>
            </div>
        @endforeach
    </div>
</div>
