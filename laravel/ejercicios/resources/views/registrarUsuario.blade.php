<?php

   $paises = [
      'ar' => 'Argentina',
      'bo' => 'Bolivia',
      'br' => 'Brasil',
      'ch' => 'Chile',
      'py' => 'Paraguay',
      'uy' => 'Uruguay',
   ];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/testuser.css">
	<script src="https://kit.fontawesome.com/487b4db8ef.js"></script>
	<title>Registrar Usuario</title>
</head>

<body>
	<div class="contenedor">
		<h1>Registración de usuarios</h1>
		<form method="post" enctype="multipart/form-data">
         {{ csrf_field() }}
			<div class="campo-form">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}">
            @error('nombre')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="apellido">Apellido</label>
				<input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}">
            @error('apellido')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="email">Email</label>
				<input type="text" name="email" id="email" value="{{ old('email') }}">
            @error('email')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="pais">País</label>
            <select name="pais" id="pais" class="pais">
               <?php foreach ($paises as $codigo => $pais) : ?>
                  <option value="<?= $codigo ?>" <?= old('pais') == $codigo ? 'selected' : '' ?>><?= $pais ?></option>
               <?php endforeach ?>
            </select>
            @error('pais')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="nacimiento">Fecha de nacimiento</label>
				<input type="date" name="nacimiento" id="nacimiento" value="{{ old('nacimiento') }}">
            @error('nacimiento')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label>Sexo</label>
				<input type="radio" name="sexo" id="mujer" value="f" {{ old('sexo') == 'f' ? 'checked' : '' }}>
            <label for="mujer">Mujer</label>
				<input type="radio" name="sexo" id="hombre" value="m" {{ old('sexo') == 'm' ? 'checked' : '' }}>
            <label for="hombre">Hombre</label>
            @error('sexo')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
         <div class="campo-form">
				<label for="avatar">Foto del perfil</label>
				<input type="file" name="avatar" id="avatar" value="{{ old('avatar') }}" accept=".jpg,.jpeg,.png,.bmp">
            @error('avatar')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="pass">Contraseña</label>
				<input type="password" name="pass" id="pass" value="{{ old('pass') }}">
            @error('pass')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<label for="passConf">Confirme la contraseña</label>
				<input type="password" name="passConf" id="passConf" value="{{ old('passConf') }}">
            @error('passConf')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
         <div class="campo-form">
				<input type="checkbox" name="terminos" id="terminos" value="1">
            <label for="terminos">He leído y acepto los términos de uso</label>
            @error('terminos')
				<p><i class="fas fa-exclamation-circle"></i>{{ $message }}</p>
            @enderror
			</div>
			<div class="campo-form">
				<button type="submit">Registrarme</button>
			</div>
		</form>
	</div>
</body>

</html>
