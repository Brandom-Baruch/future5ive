<?php

namespace App\Http\Controllers;
use App\Product;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
    	$products = Product::paginate(10);
    	return view ('welcome')->with(compact('products'));
    }
}
