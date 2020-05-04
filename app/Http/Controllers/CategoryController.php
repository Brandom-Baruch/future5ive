<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function show ($id)
    {
    	$categories = Category::find($id);

    	return view('categories.show')->with(compact('categories'));
    }
}
