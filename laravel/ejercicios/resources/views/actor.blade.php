@extends('peliculaLayout')

@section('titulo')
<title>Actor</title>
@endsection

@section('contenido')
<h1>Información del actor</h1>
<p>{{ $actor->getNombreCompleto() }} ({{ $actor->rating }})</p>
@endsection
