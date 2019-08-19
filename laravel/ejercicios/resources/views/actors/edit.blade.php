<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/css/testuser.css">
	<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
	<title>Modificar un actor</title>
</head>

<body>
   <div class="contenedor">
      <h1>Modificar un actor</h1>
		<form action="/actor/{{$actor->id}}" method="post" enctype="multipart/form-data">
         @csrf
         <input type="hidden" name="_method" value="put">
			<div class="campo-form">
				<label for="first_name">Nombre</label>
				<input type="text" name="first_name" id="first_name" value="{{ old('first_name', $actor->first_name) }}">
            @error('first_name')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="last_name">Apellido</label>
				<input type="text" name="last_name" id="last_name" value="{{ old('last_name', $actor->last_name) }}">
            @error('last_name')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<div class="portrait" {!! $actor->portraitStyle() !!}>
				</div>
				<label for="portrait">Cambiar la foto</label>
				<input type="file" name="portrait" id="portrait" value="{{ old('portrait') }}">
            @error('portrait')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="rating">Rating</label>
				<input type="text" name="rating" id="rating" value="{{ old('rating', $actor->rating) }}">
            @error('rating')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="favorite">Película favorita</label>
				<select name="favorite" id="favorite">
            @foreach ($favorites as $favorite)
               <option value="{{ $favorite->id }}" {{ $favorite->id == $actor->favorite_movie_id ? 'selected' : '' }}>
                  {{ $favorite->title }}
               </option>
            @endforeach
			</div>
         <div class="campo-form">
            <input type="submit" value="Actualizar Actor">
         </div>
      </form>
   </div>
</body>
</html>
