<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = ['product_name', 'description', 'price'];

    public function detail(){
        return $this->hasMany('App\DetailOrder', 'product_id');
    }

    public function cart(){
        return $this->hasMany('App\TempCart', 'product_id');
    }

    
}
