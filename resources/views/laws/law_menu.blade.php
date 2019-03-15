<div class="col-3 law-cate-menu">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    @foreach($catelaws as $val)
        <a class="border p-3" id="cate-pills-{{$val->id}}-tab" data-toggle="pill" href="#cate-pills-{{$val->id}}" role="tab" aria-controls="cate-pills-{{$val->id}}" aria-selected="true">
            กฏหมายที่เกี่ยวข้องกับ<br><span>{{ $val->title }}</span>
            <span class="text-indend position-absolute">{{ $val->seo }}</span>
        </a>
    @endforeach
    </div>
</div>