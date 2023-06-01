<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::with('categories')->where('quantity', '<' , 10)->get(),
        ];

        return view('dashboard.index', $data);
    }
}
