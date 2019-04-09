
 <div class="container content">
    <div class="row">
        @foreach($knowledge as $val)
            <div class="col-3 knowledge_content mb-5">
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