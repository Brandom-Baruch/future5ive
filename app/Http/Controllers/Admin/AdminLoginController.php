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
        $this->validate($request , [
            'email' => 'required|email',
            'password' => 'required|min:6',

        ]);
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
