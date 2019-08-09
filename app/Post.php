<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];

    public function User(){
        return $this->belongsTo("App\User");
    }
//	public function User(){
//		return $this->hasMany("App\User");
//	}
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function categories(){
        return $this ->belongsToMany('App\Category', 'post_categories');
    }
    public function tags(){
        return $this ->belongsToMany('App\Tag','post_tags');
    }
}
