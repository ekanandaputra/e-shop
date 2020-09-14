<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;
    
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $fillable = ['order_date', 'address', 'total_price'];

    public function detail(){
        return $this->hasMany('App\DetailOrder', 'order_id');
    }

}
