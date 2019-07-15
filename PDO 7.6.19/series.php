<?php

require 'functions.php';

try {
  $pdo = get_connection();

  if ($pdo) {
    $sql = "select id, title from series";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $series = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

} catch (Exception $e) {

}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Series</title>
  </head>
  <body>
    <div>Listado de series</div>
    <ul>
      <?php foreach($series as $serie) : ?>
      <li>
        <!-- esto es la dirección del GET en la URL, el query string -->
        <a href="serie.php?id=<?= $serie["id"] ?>">
        <!-- esto es el título de la serie -->
          <?= $serie["title"] ?>
        </a>
      </li>
      <?php endforeach ?>
    </ul>
  </body>
</html>
