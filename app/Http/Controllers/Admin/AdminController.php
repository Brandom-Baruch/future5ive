<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use File; 


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins =  Admin::all();
        return view('admin.admins.index')->with(compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $admins = new Admin();

        $admins->name = $request->input('name');
        $admins->email = $request->input('email');
        $admins->password = encrypt ($request->input('password'));
        $admins->phone = $request->input('phone');

        if($request->hasFile('image'))
         {
            $file = $request->file('image'); // obtiene el archivo que se esta subiendo 
            $path = public_path(). '/images/admins'; //creamos una carpeta dentro del archivo public
            $fileName = uniqid().'-'.$file->getClientOriginalName(); //Se coloca un nombre que no se repita
            $moved=$file->move($path , $fileName); //guardamos el archivo

            //crear 1 registro en la tabla  admins
            if($moved)
            {              
              $admins->image = $fileName;                      
              $admins->save();//guardamos y procedera en hacer un INSERT
            }
         } 
        $notification = "Se ha registrado un nuevo administrador";
        return redirect('/admin/admins')->with(compact('notification'));
    }

    public function edit($id)
    {
        $admins = Admin::find($id);
        return view('admin.admins.edit')->with(compact('admins'));
    }

    public function update(Request $request , $id)
    {
      $admins =  Admin::find($id);
      $admins->name = $request->input('name');
      $admins->email = $request->input('email');
      $admins->password = $request->input('password');
      $admins->phone = $request->input('phone');

      if($request->hasFile('image'))
         {
            $file = $request->file('image'); // obtiene el archivo que se esta subiendo 
            $path = public_path(). '/images/admins'; //creamos una carpeta dentro del archivo public
            $fileName = uniqid().'-'.$file->getClientOriginalName(); //Se coloca un nombre que no se repita
            $moved=$file->move($path , $fileName); //guardamos el archivo

      
            if($moved)
            {              
              $previousPath = $path . '/' .$admins->image;

              $admins->image = $fileName;                                    
              $saved = $admins->save();//guardamos y procedera en hacer un update
              if($saved)
                File::delete($previousPath);
              
            }
         } 
        $notification = "Se ha actualizado la información exitosamente";
        return redirect('admin/admins')->with(compact('notification'));   
    }


}
