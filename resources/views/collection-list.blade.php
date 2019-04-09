@foreach($collections as $collection)
@foreach($users as $user)
  @if($username == $user->username)
  @if($collection->is_private == 0)
  <div class="col-xl-4 col-lg-6 col-md-12 mb-3">
    <a href="/collection/{{$username}}/{{$collection->title}}-{{$collection->id}}">
      <div class="card card-container">
        <div  class="card preview-image ml-4 mt-4 @foreach($post_has_collections as $post_has_collection) @if(!$post_has_collection->find_image($collection->id)) default-priview-image @break @endif @endforeach" style="background-image: url('../images/collection/cover.png');">
          <div class="card-body p-0">
              <?php $count = 0; ?>
              @foreach($post_has_collections as $post_has_collection)
                @if($post_has_collection->collection_id == $collection->id)
                  @foreach($posts as $post)
                    @if($post_has_collection->post_id == $post->id)
                        <?php if($count == 4) break; ?>
                          <div class="img-box hasimage-{{$collection->get_post_image()}}">
                              <div class="previewImage" style="background-image: url('../storage/uploadpost/{{ $post->img }}');"></div>
                          </div>
                        <?php $count++; ?>
                      @endif
                    @endforeach
                  @endif
                @endforeach
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <a href="/collection/{{$username}}/{{$collection->title}}-{{$collection->id}}"><h4>{{$collection->title}}</h4></a>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col-6">
                    @if($collection->is_private==1)
                      <img src="{{asset('images/icons/padlock.png')}}" alt="padlock">
                    @endif
                  </div>
                </div>
                {{ csrf_field() }}
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="row">
                  <div class="col-4 pr-0">
                    <label class="heart @foreach($user_like_collections as $user_like_collection) @if($user_like_collection->user_id == Auth::user()->id) @if($user_like_collection->collection_id == $collection->id) @if($user_like_collection->is_fav == 1) heart-active @endif @endif @endif @endforeach" data-collectionid="{{$collection->id}}" data-userid="{{Auth::user()->id}}" >
                      </label>
                    <label>&nbsp</label>
                    <label class="fav-counting">{{$collection->favorite_count}}</label>
                  </div>
                  <div class="col-8">
                    <img src="{{asset('images/icons/album.png')}}" class="m-2 float-left" alt="album">
                    <label>&nbsp</label>
                    <label class="fav-image-count">{{$collection->get_post_image()}}</label>
                  </div>
                </div>
              </div>
              <div class="col-6"></div>
            </div>
          </div>
      </div>
    </a>
  </div>
  @else
    <div class="col-xl-4 col-lg-6 col-md-12 mb-3">
      <a href="/collection/{{$username}}/{{$collection->title}}-{{$collection->id}}">
        <div class="card card-container">
          <div  class="card preview-image ml-4 mt-4 @foreach($post_has_collections as $post_has_collection) @if(!$post_has_collection->find_image($collection->id)) default-priview-image @break @endif @endforeach" style="background-image: url('../images/collection/cover.png');">
            <div class="card-body p-0">
                <?php $count = 0; ?>
                @foreach($post_has_collections as $post_has_collection)
                  @if($post_has_collection->collection_id == $collection->id)
                    @foreach($posts as $post)
                      @if($post_has_collection->post_id == $post->id)
                          <?php if($count == 4) break; ?>
                            <div class="img-box hasimage-{{$collection->get_post_image()}}">
                                <div class="previewImage" style="background-image: url('../storage/uploadpost/{{ $post->img }}');"></div>
                            </div>
                          <?php $count++; ?>
                        @endif
                      @endforeach
                    @endif
                  @endforeach
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-8">
                <a href="/collection/{{$username}}/{{$collection->title}}-{{$collection->id}}"><h4>{{$collection->title}}</h4></a>
              </div>
              <div class="col-4">
                <div class="row">
                  <div class="col-6">
                    @if($collection->is_private==1)
                      <img src="{{asset('images/icons/padlock.png')}}" alt="padlock">
                    @endif
                  </div>
                  <div class="col-6">
                    <button class="btn btn-primary edit_button" data-toggle="modal" data-target="#editCollectionModal" data-userid="{{Auth::user()->id}}" data-collectid="{{$collection->id}}" data-title="{{$collection->title}}" data-description="{{$collection->description}}" data-isprivate="{{$collection->is_private}}">Edit</button>
                  </div>
                </div>
                {{ csrf_field() }}
                <input type="hidden" id="_token" value="{{ csrf_token() }}">
              </div>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="row">
                  <div class="col-4 pr-0">
                    <label class="heart @foreach($user_like_collections as $user_like_collection) @if($user_like_collection->user_id == Auth::user()->id) @if($user_like_collection->collection_id == $collection->id) @if($user_like_collection->is_fav == 1) heart-active @endif @endif @endif @endforeach" data-collectionid="{{$collection->id}}" data-userid="{{Auth::user()->id}}" >
                      </label>
                    <label>&nbsp</label>
                    <label class="fav-counting">{{$collection->favorite_count}}</label>
                  </div>
                  <div class="col-8">
                    <img src="{{asset('images/icons/album.png')}}" class="m-2 float-left" alt="album">
                    <label>&nbsp</label>
                    <label class="fav-image-count">{{$collection->get_post_image()}}</label>
                  </div>
                </div>
              </div>
              <div class="col-6"></div>
            </div>
          </div>
        </div>
      </a>
    </div>
    @endif
    @endif
  @endforeach
@endforeach

<script>
$(".edit_button").click(function () {
    console.log(this);
     var id = $(this).data('collectid');
     var title = $(this).data('title');
     var description = $(this).data('description');
     var isprivate = $(this).data('isprivate');
         console.log(this);
     $('#collection-id').val(id);
     $('#collection-name').val(title);
     $('#collection-description').val(description);
     if(isprivate == 1){
       $('#private-chk').prop("checked",true);
     }
     $('#private-chk').val(isprivate);
});
</script>
