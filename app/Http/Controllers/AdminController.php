<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Membuat Controller ini hanya dapat diaksis oleh admin
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    // Menampilkan Halaman Dashboard Pada Halaman Admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
