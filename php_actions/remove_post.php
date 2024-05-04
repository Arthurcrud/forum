<?php
include_once "db_connection.php";
session_start();

if (isset($_GET['post_id'])) {
  $postId = $_GET['post_id'];
  $sql = "DELETE FROM posts WHERE posts.id = $postId";
  $result = mysqli_query($connect, $sql);
  
  if ($result) {
    $_SESSION['message'] = "Deletado com sucesso";
  }

} else {
  echo "O parâmetro não está presente na URL.";
}
