<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
	use SoftDeletes;
	protected $date = ['deleted_at'];
	public function post(){
		return $this->belongsTo("App\Post");
	}
	public function dlc(){
		return $this->belongsTo("App\Dlc");
	}
}
