<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function user()
    {
        return view('user');
    }

    public function ordini()
    {
        return view('admin.ordini');
    }

    public function statistiche()
    {
        return view('admin.statistiche');
    }

}