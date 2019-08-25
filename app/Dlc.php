<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dlc extends Model
{
	use SoftDeletes;
	protected $date = ['deleted_at'];
	public function post(){
		return $this->belongsTo("App\Post");
	}
	public function comment(){
		return $this->hasMany('App\Comment');
	}
	public function gallery(){
		return $this->hasMany('App\Gallery');
	}
	public function User(){
		return $this ->belongsToMany('App\User','dlc_users');
	}
}
