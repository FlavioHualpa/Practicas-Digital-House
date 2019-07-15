<?php

function get_connection(){
  try {
    return $pdo = new PDO('mysql:host=localhost; dbname=movies_db', 'root', '');
  } catch (Excepction $e) {
    return false;
  }
}

function get_genres_list() {
  $pdo = get_connection();
  $sql = 'select * from genres';

}
?>

<--! terminar function genres Listado -->
