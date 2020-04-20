<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use File;

class ImageController extends Controller
{
    public function index($id)
    {
    	$product = Product::find($id);
    	$images = $product->images()->orderBy('featured','des')->get();
    	return view('admin.products.images.index')->with(compact('product','images'));
    }

    public function store (Request $request , $id)
    {
    	//guardar la img 
    	$file = $request->file('photo'); // obtiene el archivo que se esta subiendo 
    	$path = public_path(). '/images/products'; //creamos una carpeta dentro del archivo public
    	$fileName = uniqid(). $file->getClientOriginalName(); //Se coloca un nombre que no se repita
    	$moved=$file->move($path , $fileName); //guardamos el archivo

    	//crear 1 registro en la tabla  product_images
        if($moved)
        {
        	$productImage = new ProductImage();
        	$productImage->image = $fileName;
        	$productImage->product_id = $id;         	
        	$productImage->save();//guardamos y procedera en hacer un INSERT
        }
    	return back();
    }

    public function destroy(Request $request, $id)
    {    	
        $productImage = ProductImage::find($request->image_id);
        if(substr($productImage->image, 0 , 4) ==="http")
        {
            $deleted = true;
        } else
        {
          //$fullPath = public_path() . '/images/products/' . $productImage->image ; 
          $deleted = File::delete((public_path() . '/images/products/' . $productImage->image));
        }

        //eliminar el registro en la bd

        if ($deleted) {
            $productImage->delete();
        }

        return back();
    }

    public function select ($id, $id_image)
    {
        //Colocar todas las imagenes en false
        ProductImage::where('product_id',$id)->update([
            'featured' => false
        ]);

        //destacar imagen
        $productImage = ProductImage::find($id_image);
        $productImage->featured = true;
        $productImage->save();

        return back();
    }
}
