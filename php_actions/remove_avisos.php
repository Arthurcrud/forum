<?php
include_once "db_connection.php";
include_once "../includes/message.php";
session_start();

if (isset($_GET['avisos_id'])) {
  $avisoId = $_GET['avisos_id'];
  $sql = "DELETE FROM avisos WHERE avisos.id = $avisoId";
  $result = mysqli_query($connect, $sql);
  
  if ($result) {
    $_SESSION['message'] = "Deletado com sucesso";
  }else{
    $_SESSION['message'] = "Erro ao deletar" . mysqli_error($connect);
  }

} else {
  echo "<script>
   location.href = ('../index.php');
  </script>";
}