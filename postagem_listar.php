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

<h1>Listar Postagens</h1>
<?php
$sql = "SELECT * FROM posts";
$res = $conn->query($sql);
$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    print "<table class='table table-bordered table-striped table-hover'>";
    print "<tr>";
    print "<th>#</th>";
    print "<th>Conteudo</th>";
    print "<th>Titulo</th>";
    print "<th>Ações</th>";
    print "</tr>";
    while ($row = $res->fetch_object()) {
        print "<tr>";
        print "<td>" . $row->id . "</td>";
        print "<td>" . $row->content . "</td>";
        print "<td>" . $row->tittle . "</td>";
        print "<td>
                        <button onclick=\"location.href='?page=usuario_editar&id_usuario=" . $row->id . "';\" class='btn btn-success'>Editar</button>
                        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=usuario_salvar&acao=excluir&id_usuario=" . $row->id . "';}else{false;}\" class='btn btn-danger'>Excluir</button>
                    </td>";
        print "</tr>";
    }
    print "</table>";
} else {
    print "<p class='alert alert-danger'>Nenhum resultado encontrado";
}
?>