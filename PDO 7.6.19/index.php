<?php
try{
$pdo = new PDO('mysql:host=localhost; dbname=movies_db', 'root', '');
} catch (Exception $e) {
  echo $e->getMessage();
}
?>
