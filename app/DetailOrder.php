<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class DetailOrder extends Model
{
    protected $table = 'detail_orders';
    protected $primaryKey = 'detail_order_id';
    protected $fillable = ['order_id', 'product_id'];

    public function order(){
        return $this->belongsTo('App\Order', 'order_id');
    }

    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }
}
