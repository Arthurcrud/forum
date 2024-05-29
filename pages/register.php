<?php
include_once "../includes/header.php";
include_once "../includes/message.php";
include_once "../includes/navbar.php";
include_once "../php_actions/db_connection.php";
?>

<main class = "container">
<h1>Cadastrar Usuário</h1>
<form action="register_user.php" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div>
        <label>Nome do usuário</label>
        <input type="text" name="username" class="form-control" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div>
        <label>Senha</label>
        <input type="password" name="password" class="form-control" required>
    </div>
    <div>
        <button class="btn btn-success">Enviar</button>
    </div>
</form>
</main>

<?php
include_once "../includes/footer.php";
?>