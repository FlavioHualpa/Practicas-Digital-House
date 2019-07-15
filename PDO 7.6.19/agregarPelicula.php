<?php
requiere 'functions.php';

$pdo = get_connection();

if ($_POST) {
  $pdo = get_connection();
  $sql = "insert into movies () values "
  var_dump ($_POST)
  <!-- con esto vemos si está recibiendo los datos, depsués lo sacamos -->
}
 ?>

 <!DOCTYPE html>
 <html lang="" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form class="" action="agregarPelicula.php" method="post">
       <div>
         <input type="text" placeholder="Titulo">
       </div>
       <div>
         <input type="text" placeholder="Duracion">
       </div>
     </form>
   </body>
 </html>

<--! /* tenemos que hacer un foreach apra genrar las opciones de género.
En los input, agregar el name */ -->
