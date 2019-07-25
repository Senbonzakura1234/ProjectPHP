<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property array|string|null name
 */
class Category extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];
    public function posts(){
        return $this ->belongsToMany('App\Post', 'post_categories');
    }
}
