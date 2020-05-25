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

//Ruta login admin
Route::get('/admin/login', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Admin\AdminLoginController@login')->name('admin.login.submit');


//Buscar un producto especifico
Route::get('/search','SearchController@show');
Route::get('/products/json','SearchController@data');
//Mostrar categoria del producto seleccionado
Route::get('/categories/{category}','CategoryController@show');

//Mostrar la informacion del producto seleccionado
Route::get('/products/{id}','ProductController@show');
//Agregar producto al carrito
Route::post('/cart','CartDetailController@store');
//Eliminar producto del carrito
Route::delete('/cart','CartDetailController@destroy');
//Realizar pedido del carrito de compras
Route::post('/order','CartController@update');



///Administrador			
Route::middleware(['auth:admin'])->group(function () {
	
	//Gestionar administradores (usuarios)	
	Route::get('/admin/admins', 'Admin\AdminController@index');//Muestra todos los admins
	Route::get('/admin/admins/create', 'Admin\AdminController@create');//Muestra el formulario para ingresar un admin
	Route::post('/admin/admins', 'Admin\AdminController@store'); // Regresamos al index, pero con el admin agregado
	Route::get('/admin/admins/{id}/edit','Admin\AdminController@edit'); // Muestra el formulario para editar la inf del admin
	Route::post('/admin/admins/{id}/edit','Admin\AdminController@update'); //Actualiza la informacion del admin
	Route::post('/admin/admins/{id}/edit','Admin\AdminController@update'); //Elimina el administrador seleccionado
	//Crear productos		 
	Route::get('/admin/products','Admin\ProductController@index')->name('products'); //Listado de todos los productos. 
	Route::get('/admin/products/create','Admin\ProductController@create'); //Pagina del formulario
	Route::post('/admin/products','Admin\ProductController@store'); //Crear producto
	Route::get('/admin/products/{id}/edit','Admin\ProductController@edit'); //Pagina del formulario
	Route::post('/admin/products/{id}/edit','Admin\ProductController@update'); //Crear producto
	Route::post('/admin/products/{id}/delete','Admin\ProductController@destroy');//Eliminar un producto
	//administrar imagenes del producto
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





