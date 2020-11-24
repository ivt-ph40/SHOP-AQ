<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brands';
    public $fillable=['brand_desc','status'];
    protected $lifestamp =true;
    public function product(){
    	return $this->hasMany('App\Product','brand_id','id');
    }
}
