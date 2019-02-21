<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KnowledgeResearch extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function cate()
    {
        return $this->hasOne('App\CategoriesKnowledge', 'id', 'cate_id');
    }
}
