<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{
	public function user(){
		return $this->belongsTo("App\User");
	}
	public function invoice(){
		return $this->belongsTo("App\Invoice");
	}
}
