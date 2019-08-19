@extends('../layouts/peliculaLayout')

@section('titulo')
<title>Info de película</title>
<link rel="stylesheet" href="/css/testuser.css">
@endsection

@section('contenido')
   <h1>Información de la película</h1>
   @if ($pelicula === null)
      <h3>El id de película indicado no es válido</h3>
   @else
      <h3>{{ $pelicula->title }} - {{ $pelicula->genre->name ?? '(sin clasificar)' }} ({{ $pelicula->rating }})</h3>
   @endif
   <div class="related-info">
      <p class="mb-1"><b><u>Actores que trabajaron en la película:</u></b></p>
      @forelse ($pelicula->actors as $actor)
         <p class="mb-1"><a href="/actor/{{ $actor->id }}">{{ $actor->getNombreCompleto() }}</a></p>
      @empty
         <p class="mb-1">No tenemos datos</p>
      @endforelse
   </div>
@endsection
