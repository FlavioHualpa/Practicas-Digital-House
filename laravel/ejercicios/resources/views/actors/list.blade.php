@extends('../layouts/peliculaLayout')

@section('titulo')
<title>Actores</title>
@endsection

@section('contenido')
<h1>Listado de Actores</h1>
<form action="/actores/buscar" method="get">
   <label for="busqueda">Buscar actor</label>
   <input type="text" id="busqueda" name="busqueda" value="">
   <input type="submit" name="" value="Buscar">
   <input type="submit" name="" value="Limpiar" form="limpiar">
</form>
<form action="/actores" method="get" id="limpiar">
</form>
@if (isset($busqueda))
   <br>
   <h4>Filtro de búsqueda: {{ $busqueda }}</h4>
@endif
<ul>
   @foreach ($actores as $actor)
      <li>
         <a href="/actor/{{ $actor->id }}">{{ $actor->getNombreCompleto() }}</a>
      </li>
   @endforeach
</ul>
{{ $actores->links() }}
@endsection
