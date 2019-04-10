@if($cateyoutube->count() > 0)
@foreach($cateyoutube as $cate)
@if(!empty($cate->youtube))
<section class="content-youtube pb-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="my-5 text-center">กรณีศึกษา "{{$cate->title}}"</h2>
            </div>
            @foreach($youtube as $val)
              @if($val->cate_id == $cate->id)
              <div class="col-4 mb-4" data-toggle="modal" data-target="#youtubeModal{{$val->id}}">
                  <img class="img-fluid" src="https://img.youtube.com/vi/{{$val->youtube}}/maxresdefault.jpg" />
                  <p class="text-center">{{$val->title}}</p>
              </div>
              <div class="modal fade" id="youtubeModal{{$val->id}}" tabindex="-1" role="dialog" aria-labelledby="youtubeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="youtubeModalLabel">{{$val->title}}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="embed-responsive embed-responsive-16by9">
                                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$val->youtube}}" allowfullscreen></iframe>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              @endif
            @endforeach
        </div>
    </div>
</section>
@endif
@endforeach
@endif
