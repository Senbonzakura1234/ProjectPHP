<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//    public  function Posts(){
//        return $this->hasMany('App\Post');
//    }
	public function comment(){
		return $this->hasMany('App\Comment');
	}
	public function invoice(){
		return $this->hasMany('App\Invoice');
	}
	public function product(){
		return $this->hasMany('App\ProductInvoice');
	}
	public function message(){
		return $this->hasMany('App\Message');
	}
	public function Posts(){
		return $this ->belongsToMany('App\Post','post_users');
	}
	public function Dlcs(){
		return $this ->belongsToMany('App\Dlc','dlc_users');
	}
	public function country(){
		return $this->belongsTo("App\Country");
	}
}
