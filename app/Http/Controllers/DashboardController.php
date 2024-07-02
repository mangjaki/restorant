<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {
        $jumlah_produk = DB::select("SELECT menus.jenis, COUNT(*) as jumlah FROM order_details
        JOIN menus ON order_details.menu_id = menus.id
        GROUP BY menus.jenis");
    
        return view('dashboard')->with('jumlah_produk', $jumlah_produk);
      
    
    }
}

