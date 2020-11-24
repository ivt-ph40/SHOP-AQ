<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Category as Authenticatable;

class Category extends Model
{
    protected $table='categories';
    public $fillable=['category_desc','status'];
    protected $lifestamp =true;

    public function product(){
    	return $this->hasMany('App\Product','category_id','id');
    }
}
