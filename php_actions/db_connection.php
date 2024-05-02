<?php
$servername = "localhost";
$user = "root";
$pass = "123456";
$db_name = "forum";

$connect = mysqli_connect($servername, $user, $pass, $db_name);
$_SESSION['message'] = "Conexão estabelecida com sucesso";

if (mysqli_connect_error()) {
  echo "Erro ao se conectar ao banco de dados" . mysqli_connect_error();
}
