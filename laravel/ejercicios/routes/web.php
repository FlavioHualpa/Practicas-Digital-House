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

Route::get('/', function () {
   return view('welcome');
});

Route::get('/miPrimerRuta', function () {
   return 'Creé mi primera ruta en Laravel';
});

Route::get('esPar/{numero}', function ($numero) {
   return $numero % 2 == 0 ? $numero . ' es par.' : $numero . ' es impar.';
});

Route::get('sumar/{a}/{b}/{c?}', function ($a, $b, $c = 0) {
   if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
      return $a + $b + $c;
   }
   return 'Debe proporcionar valores numericos.';
});

Route::get('/peliculas', function() {
   $peliculas = [
      [
         'titulo' => 'Avatar',
         'rating' => 8.1
      ],
      [
         'titulo' => 'Iron Man',
         'rating' => 6.5
      ],
      [
         'titulo' => 'Cars',
         'rating' => 8.6
      ],
      [
         'titulo' => '4x4',
         'rating' => 9.0
      ],
      [
         'titulo' => 'Mi pobre angelito',
         'rating' => 5.9
      ]
   ];

   return view(
      'peliculas',
      [ 'peliculas' => $peliculas ]
   );
});

Route::get('/peliculas/{id}', function($id) {
   $peliculas = [
      [
         'titulo' => 'Avatar',
         'rating' => 8.1
      ],
      [
         'titulo' => 'Iron Man',
         'rating' => 6.5
      ],
      [
         'titulo' => 'Cars',
         'rating' => 8.6
      ],
      [
         'titulo' => '4x4',
         'rating' => 9.0
      ],
      [
         'titulo' => 'Mi pobre angelito',
         'rating' => 5.9
      ]
   ];

   return view(
      'detallePelicula',
      [ 'id' => $id, 'peliculas' => $peliculas ]
   );
});

Route::get('/actores', 'ActorsController@directory');

Route::get('/actor/{id}', 'ActorsController@show');

Route::get('/actores/buscar', 'ActorsController@search');

Route::get('/registracion', 'UsuariosController@create');

Route::post('/registracion', 'UsuariosController@store');
