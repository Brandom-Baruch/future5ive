<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','IndexController@index');

//Login Users
Auth::routes(); //ruta de autenticacion
Route::get('/home', 'HomeController@index')->name('home'); //Ruta para login


///Administrador			
Route::middleware(['auth','admin'])->group(function () {	
Route::get('/admin/products','Admin\ProductController@index'); //Listado de todos los productos. 
Route::get('/admin/products/create','Admin\ProductController@create'); //Pagina del formulario
Route::post('/admin/products','Admin\ProductController@store'); //Crear producto

Route::get('/admin/products/{id}/edit','Admin\ProductController@edit'); //Pagina del formulario
Route::post('/admin/products/{id}/edit','Admin\ProductController@update'); //Crear producto
Route::post('/admin/products/{id}/delete','Admin\ProductController@destroy');//Eliminar un producto
//administrar imagenes
Route::get('/admin/products/{id}/images','Admin\ImageController@index'); //Listado de imagenes
Route::post('/admin/products/{id}/images','Admin\ImageController@store'); //Registrar imagenes
Route::post('/admin/products/{id}/images/delete','Admin\ImageController@destroy'); //Eliminar imagenes especifica
Route::get('/admin/products/{id}/images/{id_image}','Admin\ImageController@select'); //destacar imagen

/////////////Categorias

Route::get('/admin/categories','Admin\CategoryController@index'); //Listado de categorias. 
Route::get('/admin/categories/create','Admin\CategoryController@create'); //Pagina del formulario
Route::post('/admin/categories','Admin\CategoryController@store'); //Crear categoria

Route::get('/admin/categories/{id}/edit','Admin\CategoryController@edit'); //Pagina del formulario
Route::post('/admin/categories/{id}/edit','Admin\CategoryController@update'); //Crear categoria
Route::post('/admin/categories/{id}/delete','Admin\CategoryController@destroy');//Eliminar un categoria


});

//Mostrar categoria del producto seleccionado
Route::get('/products/{id}','CategoryController@show');

//Mostrar la informacion del producto seleccionado
Route::get('/products/{id}','ProductController@show');
//Agregar producto al carrito
Route::post('/cart','CartDetailController@store');
//Eliminar producto del carrito
Route::delete('/cart','CartDetailController@destroy');
//Realizar pedido del carrito de compras
Route::post('/order','CartController@update');



