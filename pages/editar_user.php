<?php
include_once "../includes/header.php";
include_once "../includes/message.php";
include_once "../includes/navbar.php";

include_once "../php_actions/db_connection.php";

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id=$id";
    $res = $connect->query($sql);
    if($res->num_rows > 0)
    {
        while($dados = mysqli_fetch_assoc($res))
        {
            $username = $dados['username'];
            $password = $dados['password'];
            $email = $dados['email'];
        }
    }
    else
    {
        header('Location: ../index.php');
    }
}
else
{
    header('Location: listar_user.php');
}
?>




<main class = "container">
<h1>Editar Usuário</h1>
<form action="save_editar.php" method="POST">
    <div>
        <label>Nome do usuário</label>
        <input type="text" name="username" class="form-control" value=<?php echo $username ?>>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" class="form-control" value=<?php echo $email?>>
    </div>

    <?php
     if(isset($_SESSION['user_id']) && isset($_SESSION['role_id']) && ($_SESSION['role_id'] == 1)){
    ?>
    <div>
        <label>Senha</label>
        <input type="password" name="password" class="form-control">
    </div>
    <?php
     }
     ?>

    <?php

    if(isset($_SESSION['user_id']) && isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1){
    echo "<div>
        <label>Permissao</label>
        <input type='text' name='permissao' id='role' placeholder='Insira 1 para admin e 3 para moderador'>
    </div>";
    }
    ?>
    <div>
        <input type="hidden" name="id" value=<?php echo $id ?>>
        <button class="btn btn-success" name="update">Editar</button>
    </div>
</form>
</main>

<?php
include_once "../includes/footer.php";
?>