<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsActivitys extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function cate()
    {
        return $this->hasOne('App\CategoriesNewsActivitys', 'id', 'cate_id');
    }
}
