<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');            
           // $table->string('payment-type')->nullable(); //tipo de pago
            $table->string('status'); //Activo, Pendiente, Aprovado, Cancelado, Terminado 
            $table->integer('discount')->default(0); //Descuento
            $table->date('order_date')->nullable(); //fecha de orden
            $table->date('arrived-date')->nullable(); //fecha de entrega
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
