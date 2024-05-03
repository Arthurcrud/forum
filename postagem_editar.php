<?php
include_once "includes/header.php";
include_once "includes/message.php";
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

<h1>Editar Usuário</h1>
<?php
$sql = "SELECT * FROM users WHERE id=" . $_REQUEST['id'];

$res = $conn->query($sql);

$row = $res->fetch_object();
?>
<form action="?page=usuario-salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php print $row->id; ?>">
    <div class="mb-3">
        <label>Conteudo</label>
        <input type="nome" name="content" class="form-control" value="<?php print $row->nome ?>" required>
    </div>
    <div class="mb-3">
        <label>Titulo</label>
        <input type="text" name="tittle" class="form-control" value="<?php print $row->tittle ?>" required>
    </div>
    <button class="btn btn-success">Enviar</button>
    </div>
</form>