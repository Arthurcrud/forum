<?php
include_once "../includes/functions.php";
include_once "../includes/message.php";
include_once "../php_actions/db_connection.php";

session_start();

if(isset($_POST['update'])) {
    
    $id = clear($_POST['id']);
    $username = clear($_POST['username']);
    $email = clear($_POST['email']);
    $password = clear($_POST['password']);

    
    if (empty($username) || empty($email) || empty($password)) {
        $_SESSION['message'] = "Por favor, preencha todos os campos.";
        header("Location: update_profile.php");
        exit; 
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users 
            SET username=?, 
                `password` =?, 
                email=?  
            WHERE id=?";

    
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("sssi", $username, $hashed, $email, $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Editado com sucesso!";
    } else {
        $_SESSION['message'] = "Erro ao editar dados: " . $connect->error;
    }

    $stmt->close();
}

header('Location: ../index.php');
exit; 
?>
