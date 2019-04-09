<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\user;
use Auth;
use App\follow;

class follow extends Model
{
  protected $table = 'follows';
  public $primaryKey = 'id';
  public $timestamps = true;

  public function user()
  {
    return $this->hasOne('App\user','id', 'owner_id');
  }
  public function findFollowing($following_id)
  {
    $following = user::where('id', $following_id)->first();
    return $following;
  }

  public function I_following()
  {
    $I_following = $this->where('owner_id', Auth::user()->id)->where('following_id', $this->following_id)->where('is_follow', 1)->first();
    return $I_following;
  }

  public function followingpeople($user_id)
  {
    $followerpeople = $this->where('owner_id', Auth::user()->id)->where('following_id', $user_id)->where('is_follow', 1)->first();
    return $followerpeople;
  }

}
