<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
    	$products=DB::table('products')
        ->get();
        return view('home.index', ['products' => $products]);  	
    }
}
