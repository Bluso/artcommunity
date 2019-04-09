<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Youtube extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function cate()
    {
        return $this->hasOne('App\CategoriesYoutube', 'id', 'cate_id');
    }
}
