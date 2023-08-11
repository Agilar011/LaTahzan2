<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function userDashboard()
    {
        return view('user_dashboard'); // Ganti dengan tampilan dashboard untuk user
    }

    public function adminDashboard()
    {
        return view('admin_dashboard'); // Ganti dengan tampilan dashboard untuk admin
    }
}
