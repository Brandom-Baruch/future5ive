<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
    	$products=Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); //listado
    }

    public function create()
    {   
        
    	return view('admin.products.create'); //formulario de registro
    }

    public function store(Request $request)
    {
        
        $messages =[
            'name.required' => 'Es necesario ingresar un nombre para el producto',
            'name.min' =>'El nombre del producto debe tener al menos 3 caracteres',
            'description.required' => 'La descripción es un campo obligatorio',
            'descripcion.max'=> 'La descripció debe de tener un maximo de 200 caracteres',
            'long_description' => 'La descripción extendida debe de tener un maximo de 600 caracteres',
            'price.required' => 'Es necesario ingresar un precio para el producto',
            'price.numeric' => 'Solamente acepta valores numericos',
            'price.min' => 'No acepta valores negativos en el campo de precio',
            'stock.required' => 'Es necesario ingresar un stock para el producto',
            'stock.numeric' => 'Solamente acepta valores numericos',
            'stock.min' => 'No acepta valores negativos en el campo de stock'

        ];

        $rules = [
            'name' => 'required|min:3',
            'description' =>'required|max:200',        
            'long_description' => 'max:600',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0'
        ];
        $this->validate($request,$rules,$messages);



        //registrar nuevo producto
        //dd($request->all()); //devuelve todos los datos que se agrego en el formulario

        $product = new Product(); //instancia

        $product->name=$request->input('name');
        $product->price=$request->input('price');
        $product->description=$request->input('description');
        $product->stock=$request->input('stock');
        $product->long_description=$request->input('long_description');
        $product->save(); //insert

        return redirect('/admin/products');
    }

    public function edit ($id){
        
        //return "Esperamos el id $id";
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); //Form de edicion
    }

    public function update(Request $request , $id)
    {

         $messages =[
            'name.required' => 'Es necesario ingresar un nombre para el producto',
            'name.min' =>'El nombre del producto debe tener al menos 3 caracteres',
            'description.required' => 'La descripción es un campo obligatorio',
            'descripcion.max'=> 'La descripció debe de tener un maximo de 200 caracteres',
            'long_description' => 'La descripción extendida debe de tener un maximo de 600 caracteres',
            'price.required' => 'Es necesario ingresar un precio para el producto',
            'price.numeric' => 'Solamente acepta valores numericos',
            'price.min' => 'No acepta valores negativos en el campo de precio',
            'stock.required' => 'Es necesario ingresar un stock para el producto',
            'stock.numeric' => 'Solamente acepta valores numericos',
            'stock.min' => 'No acepta valores negativos en el campo de stock'

        ];

        $rules = [
            'name' => 'required|min:3',
            'description' =>'required|max:200',        
            'long_description' => 'max:600',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0'
        ];
        $this->validate($request,$rules,$messages);
        
        //registrar nuevo producto
        //dd($request->all()); //devuelve todos los datos que se agrego en el formulario

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->stock = $request->input('stock');
        $product->long_description = $request->input('long_description');
        $product->save(); //update
        return redirect('/admin/products');
    }

    public function destroy ($id){

        $product= Product::find($id);
        $product->delete(); //eliminar
        return back(); //redirige a la misma pagina
    }

}
