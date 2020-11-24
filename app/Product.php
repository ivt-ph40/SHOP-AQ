<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    public $fillable=['id','product_name','category_id','brand_id', 'product_desc', 'product_price', 'product_image', 'status', 'inventory'];
    protected $lifestamp =true;

    public function category(){
    	return $this->belongsTo('App\Category','category_id','id');
    }

    public function brand(){
    	return $this->belongsTo('App\Brand','brand_id','id');
    }
}
