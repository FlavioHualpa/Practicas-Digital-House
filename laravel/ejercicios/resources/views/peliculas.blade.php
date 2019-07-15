@extends('peliculaLayout')

   @section('titulo')
      <title>Listado de películas</title>
   @endsection

   @section('contenido')
      <h1>Mis Películas</h1>
      <ul>
         @forelse ($peliculas as $peli)
            <li>
               {{ $peli['titulo'] }}
               @if ($peli['rating'] > 8)
                  {{ ' - :) recomendada! ' }}
               @endif
            </li>
         @empty
            <p>No hay películas</p>
         @endforelse
      </ul>
   @endsection
