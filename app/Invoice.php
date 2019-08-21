<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	public function user(){
		return $this->belongsTo("App\User");
	}
	public function country(){
		return $this->belongsTo("App\Country");
	}
	public function product(){
		return $this->hasMany('App\ProductInvoice');
	}
}
