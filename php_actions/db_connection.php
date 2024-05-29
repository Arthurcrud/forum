<?php
$servername = "localhost";
$user = "root";
$pass = "";
$db_name = "forum";

$connect = mysqli_connect($servername, $user, $pass, $db_name);
global $connect;

if (mysqli_connect_error()) {
  echo "Erro ao se conectar ao banco de dados" . mysqli_connect_error();
}
