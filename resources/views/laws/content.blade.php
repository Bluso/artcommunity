<div class="container block-laws mt-lg-5 pt-lg-5 mt-sm-5 margin-content">
    <div class="row">
        @include('laws.law_menu')
        <div class="col-12 col-lg-9 mt-lg-0 mt-5">
            <div class="tab-content" id="v-pills-tabContent">
            @foreach($catelaws as $cate)
                <div class="tab-pane fade show active" id="cate-pills-{{ $cate->id }}" role="tabpanel" aria-labelledby="cate-pills-{{ $cate->id }}-tab">
                    <h2>กฏหมายที่เกี่ยวข้องกับ{{ $cate->title }}</h2>
                    <div class="row">
                        <div class="col-12">
                          <div class="dash float-left my-2"></div>
                        </div>
                    </div>
                    <div class="float-left row w-100">
                        <div class="accordion" id="LawsCol-{{ $cate->id }}">
                            @foreach($lawscontent as $law)
                            @if($cate->id == $law->law_cate_id)
                            <div class="panel-group">
                                <div id="Law-{{ $law->id }}">
                                    <h3 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#Law-{{ $law->id }}-collapse" aria-expanded="true" aria-controls="Law-{{ $law->id }}-collapse">
                                    <i class="more-less  fa fa-angle-right mr-2"></i>{{ $law->title }}
                                        </button>
                                    </h3>
                                </div>

                                <div id="Law-{{ $law->id }}-collapse" class="collapse show" aria-labelledby="Law-{{ $law->id }}" data-parent="#LawsCol-{{ $law->law_cate_id }}">
                                    <div class="pt-0 card-body">
                                        {!! $law->detail !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
