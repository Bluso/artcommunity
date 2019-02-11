<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelatedLaw extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function cate()
    {
        return $this->hasOne('App\CategoriesRelatedLaw', 'id', 'law_cate_id');
    }
}
