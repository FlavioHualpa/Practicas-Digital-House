@extends('../layouts/peliculaLayout')

@section('titulo')
<title>Perfil del usuario</title>
<link rel="stylesheet" href="/css/testuser.css">
@endsection

@section('contenido')
<h1>Perfil del usuario</h1>

<div class="related-info">
   <div class="panel-info">
      <div class="portrait" {!! $user->avatarStyle() !!}>
      </div>
   </div>
   <div class="panel-info">
      <h3>{{ $user->nombreCompleto() }}</h3>
      <p></p>
      <p style="margin-bottom: 0">Teléfono</p>
      <h3>{{ $user->phone }}</h3>
      <p></p>
      <p style="margin-bottom: 0">E-mail</p>
      <h3>{{ $user->email }}</h3>
   </div>
</div>
@endsection
