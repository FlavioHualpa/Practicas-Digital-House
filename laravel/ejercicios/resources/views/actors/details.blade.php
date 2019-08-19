@extends('../layouts/peliculaLayout')

@section('titulo')
<title>Actor</title>
<link rel="stylesheet" href="/css/testuser.css">
@endsection

@section('contenido')
<h1>Información del actor</h1>
<h3>{{ $actor->getNombreCompleto() }} ({{ $actor->rating }})</h3>
<div class="related-info">
   <div class="panel-info">
      <p><b>Película favorita:</b> {{ $actor->favoriteMovie->title ?? 'ninguna' }}</p>
      <p class="mb-1"><b><u>Películas en las que trabajó:</u></b></p>
      @forelse ($actor->movies as $movie)
         <p class="mb-1"><a href="/peliculas/{{ $movie->id }}">{{ $movie->title }}</a></p>
      @empty
         <p class="mb-1">No tenemos datos</p>
      @endforelse
   </div>
   <div class="panel-info">
      <div class="portrait" {!! $actor->portraitStyle() !!}>
      </div>
   </div>
</div>
<p></p>
<form action="/actor/{{$actor->id}}" method="post">
   @csrf
   {{ method_field('delete') }}

   <!--<input type="hidden" name="id" value="{{ $actor->id }}">-->
   <input type="submit" value="Eliminar">
</form>
@endsection
