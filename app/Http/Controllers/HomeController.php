<?php

namespace App\Http\Controllers;

use App\Order;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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