<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.home');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view ('client.config')->with(compact('user'));        
    }

    public function update(Request $request, $id)
    {   
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        //$user->telefono = $request->telefono;
        $user->save();

        $notification = 'Datos actualizados';
        return redirect('/home')->with(compact('notification'));
    }

}
