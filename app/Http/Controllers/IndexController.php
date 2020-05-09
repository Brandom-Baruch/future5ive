<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {						//Muestra las categorias que tengan por lo menos un producto en la categoria
    	$categories = Category::has('products')->get();
    	return view ('welcome')->with(compact('categories'));
    }
}
