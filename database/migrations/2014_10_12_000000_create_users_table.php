<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('apellidoM')->nullable();
            $table->string('apellidoP')->nullable();
            $table->string('direccion')->nullable();            
            $table->char('noInterior',4)->nullable();
            $table->char('noExterior',4)->nullable();
            $table->string('estado')->nullable();
            $table->char('codigoP',7)->nullable();
            $table->string('email')->unique();
            $table->integer('telefono')->nullable();
            $table->string('password');
            $table->boolean('admin')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
