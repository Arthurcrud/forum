<?php
include_once "../includes/functions.php";
include_once "../includes/message.php";
require_once 'db_connection.php';

session_start();

if (isset($_SESSION["user_id"])) {

  $title = clear($_POST['title']);
  $content = clear($_POST['content']);
  $userId = $_SESSION["user_id"];

  $sql = "INSERT INTO posts (title, content, user_id) VALUES ('$title', '$content', '$userId')";
  $result = mysqli_query($connect, $sql);

  if ($result) {
    $_SESSION['message'] = "Postado com sucesso!";
  } else {
    $_SESSION['message'] = "Erro ao inserir dados: " . mysqli_error($connect);
  }
  header("Location: ../index.php");
} else {
  echo "<script>
   location.href = ('../pages/login.php');
  </script>";
}
