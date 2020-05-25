<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Cart; 
use App\User; 

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $user; //Atributo user
    public $cart; //Atributo cart

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user , Cart $cart) //Como parametro tiene las dos instancias
    {
        //Tomamos los valores que nos envia el constructor para guardarlos en los atributos publicos
        //Para que esten disponibles en la vista que se creo 
        $this->user = $user; 
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.new-order')
        ->subject('Un cliente ha realizo un nuevo pedido');
    }
}
