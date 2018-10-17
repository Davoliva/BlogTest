<?php


// Route::get('job',function(){
//     dispatch(new \App\Jobs\SendEmail);

//     return "Listo";
// });

//verificar las consultas sql apra evitar el problema n+1
// DB::listen(function($query){
//     echo "<pre>{$query->sql}</pre>";
// });

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

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);

Route::get('saludos/{nombre?}', ['as' => 'saludo','uses' => 'PagesController@saludo' ])->where('nombre', "[A-Za-z]+");
Auth::routes();

//CRUD
Route::resource('mensajes', 'MessagesController');
Route::resource('usuarios', 'UsersController');

/** PRUEBAS */

Route::get('roles', function(){
    return \App\Role::with('user')->get();
});

//crear un usuario
// App\User::create([
//     'name' => 'blake',
//     'email' => 'blake@gmail.com',
//     'password' => bcrypt('199244')
// ]);
