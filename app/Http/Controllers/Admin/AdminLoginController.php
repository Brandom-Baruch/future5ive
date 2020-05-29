<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    
    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	//Colocar las reglas de validacion
        
        $rules = [
           'email' => 'required|email',
           'password' => 'required|min:6'
        ];

        $messages =[
           'email.required' => 'El correo es un campo obligatorio',
           'email.email' => 'El correo electronico esta mal escrito',
           'email.email' => 'El correo electronico no se encuentra en la base de datos',
           'password.required' => 'La contraseña es un campo obligatorio',
           'password.min' => 'La contraseña debe tener por lo menos 6 caracteres',           
        ];

        $this->validate($request,$rules,$messages);
        //return true;

        //Pasamos los datos y probamos si puede iniciar sesion 
      	if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) 
          {
            //si accede, se redirige al dashboard del admin
            return redirect()->intended(route('products'));
          }
          //Si los datos son incorrectos, mandamos al admin al login de nuevo para que intente de nuevo \

          //De igual manera dejamos el correo
          return redirect()->back()->withInput($request->only('email','remember'));
    	}
}
