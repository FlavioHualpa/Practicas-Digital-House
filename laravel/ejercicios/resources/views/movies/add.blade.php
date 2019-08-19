<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="/css/testuser.css">
	<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
	<title>Agregar una película</title>
</head>

<body>
   <div class="contenedor">
		<h1>Agregar una película</h1>
		<form action="/peliculas" method="post">
         @csrf
			<div class="campo-form">
				<label for="title">Título</label>
				<input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="length">Duración</label>
				<input type="text" name="length" id="length" value="{{ old('length') }}">
            @error('length')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="rating">Rating</label>
				<input type="text" name="rating" id="rating" value="{{ old('rating') }}">
            @error('rating')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="awards">Premios</label>
				<input type="text" name="awards" id="awards" value="{{ old('awards') }}">
            @error('awards')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="release">Fecha de estreno</label>
				<input type="date" name="release" id="release" value="{{ old('release') }}">
            @error('release')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="genre">Género</label>
				<select name="genre" id="genre">
            @foreach ($genres as $genre)
               <option value="{{ $genre->id }}" {{ $genre->id == old('genre') ? 'selected' : '' }}>
                  {{ $genre->name }}
               </option>
            @endforeach
			</div>
         <div class="campo-form">
            <input type="submit" value="Agregar Película">
         </div>
      </form>
   </div>
</body>
</html>
