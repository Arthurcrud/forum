<?php
include_once "../includes/functions.php";
include_once "../includes/message.php";
require_once '../php_actions/db_connection.php';

session_start();

$username = clear($_POST["username"]);
$email = clear($_POST["email"]);
$password = clear($_POST["password"]);
$role_id = 2;

$hashed = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (username, email, `password`, role_id) VALUES ('$username', '$email', '$hashed', '$role_id')";
$result = mysqli_query($connect, $sql);

if ($result) {
    $_SESSION['message'] = "Cadastrado com sucesso!";
} else {
    $_SESSION['message'] = "Erro ao inserir dados: " . mysqli_error($connect);
}
header("Location: login.php");

