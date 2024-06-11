<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Product;
use App\Models\Admin;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {   
        
        return view('dashboard.index',[
            'transaction' => Transaction::count(),
            'product' => Product::count(),
            'totalAmount' => Transaction::get()->sum('total_amount'),
        ]);
    }
}
