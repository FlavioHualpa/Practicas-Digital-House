@extends('peliculaLayout')

   @section('titulo')
      <title>Info de película</title>
   @endsection

   @section('contenido')
      <h1>Mis Películas</h1>
      @if (!is_numeric($id) || $id < 0 || $id >= count($peliculas))
         <h4>El id de película indicado no es válido</h4>
      @else
         <h4>{{ $peliculas[$id]['titulo'] }} ({{ $peliculas[$id]['rating'] }})</h4>
      @endif
   @endsection
