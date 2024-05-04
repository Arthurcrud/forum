<?php
include_once "../includes/functions.php";
require_once '../php_actions/db_connection.php';

session_start();

if (isset($_SESSION["user_id"])) {

  $title = mysqli_escape_string($connect, $_POST['title']);
  $content = mysqli_escape_string($connect, $_POST['content']);
  $postId = mysqli_escape_string($connect, $_POST['id']);

  $sql = "UPDATE posts SET title = '$title', content = '$content' WHERE posts.id = $postId";
  $result = mysqli_query($connect, $sql);

  if ($result) {
    $_SESSION['message'] = "Atualizado com sucesso!";
  } else {
    $_SESSION['message'] = "Erro ao inserir dados: " . mysqli_error($connect);
  }
  header("Location: ../index.php");
} else {
  echo "<script>
   location.href = ('../pages/login.php');
  </script>";
}
