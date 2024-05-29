<?php
    include_once "../includes/functions.php";
    include_once "../includes/message.php";
    include_once "../php_actions/db_connection.php";

    if(isset($_POST['update'])) {
        $id = $_POST['id'];
        $username = clear($_POST['username']);
        $email = clear($_POST['email']);
        $password = clear($_POST['password']);
        $permissao = clear($_POST['permissao']);

        $hashed = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "UPDATE users 
                SET username='$username', 
                   `password` ='$hashed', 
                    email='$email', 
                    role_id=$permissao 
                WHERE id=$id";
        
        $res = $connect->query($sql);

        if ($res) {
            $_SESSION['message'] = "Editado com sucesso!";
        } else {
            $_SESSION['message'] = "Erro ao inserir dados: " . mysqli_error($connect);
    }
}
    header('Location: listar_user.php');

?>