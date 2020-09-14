<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempCart extends Model
{
    public $timestamps = false;
    
    protected $table = 'temp_cart';
    protected $primaryKey = 'temp_cart_id';
    protected $fillable = ['user_id', 'product_id', 'pcs'];

    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }
}
