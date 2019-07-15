<?php

require 'funciones.php';


try {
  $pdo = get_connection();

  if ($pdo) {
    $sql = "select * from series";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $serie = $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

} catch (Exception $e) {

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    

  </body>
</html>
