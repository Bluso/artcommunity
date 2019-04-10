<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesYoutube extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public function youtube()
    {
        return $this->hasOne('App\Youtube', 'cate_id', 'id');
    }
}
