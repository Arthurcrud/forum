<?php 
include_once "../includes/functions.php";
include_once "../includes/message.php";
require_once "db_connection.php";

session_start();

$title = clear($_POST['title']);
$content = clear($_POST['content']);
$userId = $_SESSION["user_id"];

$sql = "INSERT INTO avisos (title, content, user_id) VALUES ('$title', '$content', '$userId')";
$res = mysqli_query($connect, $sql);

if ($res){
    $_SESSION['message'] = "Postado com sucesso!";
  } else {
    $_SESSION['message'] = "Erro ao inserir dados:" . mysqli_error($connect);
}
header("Location: ../index.php");


