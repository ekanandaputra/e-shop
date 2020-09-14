<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notif;

class adminNotifController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showNotif()
    {
        $notif = Notif::orderBy('notif_id', 'DESC')->get();
    	return view('admin/notif/notif', ['notif' => $notif]);
    }
}
