<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon; //Es una clase de laravel que nos permite manipular fechas.
use App\Admin;
use App\Mail\NewOrder;
use Mail;
class CartController extends Controller
{
    public function update()
    {	
    	$client = auth()->user(); //Creamos una variable para verificar si el usuario esta activo
    	$cart = $client->cart; //Accedemos al carrito del usuario activo
    	$cart->status = 'Pending'; //Si el usuario esta activo, cambiamos a su carrito de compras como pendiente
    	$cart->order_date = Carbon::now(); //Guardamos la fecha que se hizo el pedido
    	$cart->save(); //Guardamos el carrito

    	$admins = Admin::where('role','admin')->get();//Pasamos a los usuarios que queremos enviar el correo                  //Se crea una instancia 
        Mail::to($admins)->send(new NewOrder($client, $cart)); //Le pasamos los datos que requiere la instancia (El usuario quien hace el pedido y la informacion del carrito.)

    	$notification = 'Tu pedido se ha registrado correctamente. Te contactaremos pronto vía email.';
    	return back()->with(compact('notification'));
    }
}
