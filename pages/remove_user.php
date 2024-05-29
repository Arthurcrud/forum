<?php
    if(!empty($_GET['id']))
    {
      include_once "../php_actions/db_connection.php";
      include_once "../includes/message.php";
      include_once "../includes/functions.php";

        $id = $_GET['id'];

        $sql = "SELECT *  FROM users WHERE id=$id";

        $res = $connect->query($sql);

        if($res->num_rows > 0)
        {
            $sqlD = "DELETE FROM users WHERE id=$id";
            $resD = $connect->query($sqlD);
        }

        if ($resD) {
            $_SESSION['message'] = "Deletado com sucesso!";
        } else {
            $_SESSION['message'] = "Erro ao deletar dados: " . mysqli_error($connect);
    }
}
    header('Location: listar_user.php');
   
?>