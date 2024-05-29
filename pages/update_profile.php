<?php 
include_once "../includes/header.php";
include_once "../includes/navbar.php";
include_once "../php_actions/db_connection.php";



if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT id, username, email, `password` FROM users WHERE id = $user_id";
    $res = $connect->query($sql);

    if($res->num_rows > 0) {
        while($dados = mysqli_fetch_assoc($res)) {
            $username = $dados['username'];
            $password = $dados['password'];
            $email = $dados['email'];
        }
    } else {
        header('Location: ../index.php');
        exit(); 
    }
} else {
    header('Location: ../index.php');
    exit(); 
}

?>

<main class = "container">
<h1>Editar Perfil</h1>
<form action="save_update.php" method="POST">
    <div>
        <label>Nome do usuário</label>
        <input type="text" name="username" class="form-control" value=<?php echo $username ?>>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" class="form-control" value=<?php echo $email?>>
    </div>

    <div>
        <label>Senha</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div>
        <input type="hidden" name="id" value=<?php echo $user_id ?>>
        <button class="btn btn-success" name="update">Editar</button>
    </div>
</form>
</main>

<?php
include_once "../includes/footer.php";
?>