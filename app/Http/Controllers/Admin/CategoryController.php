<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
   	public function index()
   	{
   		$categories = Category::orderBy('id')->paginate(10);

   		return view ('admin.categories.index')->with(compact('categories'));
   	}

   	public function create ()
   	{
   		return view ('admin.categories.create');
   	}

   	public  function store (Request $request)
   	{
         $messages =[
            'name.required' => 'Es necesario ingresar un nombre para la categoría',
            'name.min' =>'El nombre de la categoría debe tener al menos 3 caracteres',
            'description.required' => 'La descripción es un campo obligatorio',
            'descripcion.max'=> 'La descripció debe de tener un maximo de 200 caracteres',            
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' =>'required|max:200'            
        ];
        $this->validate($request,$rules,$messages);

        $category = new Category();

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        $notification = "Se ha agregado nueva categoria";
        return redirect('/admin/categories')->with(compact('notification'));

   	}

      public function edit ($id)
      {
         $category = Category::find($id);         

         return view ('admin.categories.edit')->with(compact('category'));
      }

      public function update (Request $request , $id)
      {
         $messages =[
            'name.required' => 'Es necesario ingresar un nombre para la categoría',
            'name.min' =>'El nombre de la categoría debe tener al menos 3 caracteres',
            'description.required' => 'La descripción es un campo obligatorio',
            'descripcion.max'=> 'La descripció debe de tener un maximo de 200 caracteres',            
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' =>'required|max:200'            
        ];

        $this->validate($request,$rules,$messages);

        $category =  Category::find($id);

        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->save();

        $notification = "Se ha actualizado la categoria exitosamente";
        return redirect('admin/categories')->with(compact('notification'));

      }
   
       public function destroy ($id)
       {

        $category= Category::find($id);
        $category->delete(); //eliminar
        $notification = "Se ha eliminado la categoria exitosamente.";
        return back()->with(compact('notification'));         
      }
}
