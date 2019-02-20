<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesKnowledge extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
