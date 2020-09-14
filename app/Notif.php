<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif extends Model
{
    protected $table = 'notifs';
    protected $primaryKey = 'notif_id';
    protected $fillable = ['description'];
}
