<?php
include_once "includes/header.php";
include_once "includes/message.php";
include_once "php_actions/db_connection.php";
?>

<header>
    <nav>
        <div class="nav-wrapper px-4 #ffd0dd header-container">
            <a href="#" class="brand-logo">Eva's News</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="index.php">Home</a></li>
                <li><a href="usuario_cadastrar.php">Cadastro</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>
</header>

<h1>Cadastrar Usuário</h1>
<form action="usuario_salvar.php" method="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div>
        <label>Nome do usuário</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="email" class="form-control" required>
    </div>
    <div>
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <div>
        <button class="btn btn-success">Enviar</button>
    </div>
</form>