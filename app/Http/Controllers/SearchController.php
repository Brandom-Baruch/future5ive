<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show (Request $request)
    {
    	$searches = $request->input('searches');
    	$products = Product::where('name','like',"%$searches%")->paginate(10);

    	 //Si el usuario sabe el nombre del producto
    	if($products->count() ==1)
		{	//Accedemos a su id del producto
			$id = $products->first()->id;
			//Dirigimos al usuario donde esta el producto
    		return redirect("products/$id");
		}    		
    		
		return view('search.show')->with(compact('products','searches'));
    }

    public function data ()
    {                                       //pluck solamente extrae el valor indicado
    	$products =  Product::pluck('name'); //en este caso solamente es name
    	return $products;
    }
}
