<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $nome = $_POST['username'];
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $sql = "INSERT INTO users (username, email, 'password') 
                    VALUES ('{$nome}', '{$email}','{$senha}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso');</script>";
            print "<script>location.href='?page=usuario_listar';</script>";
        } else {
            print "<script>alert('Não foi possível');</script>";
            print "<script>location.href='?page=usuario_listar';</script>";
        }
        break;


    case 'editar':
        $nome = $_POST['username'];
        $email = $_POST['email'];
        $senha = $_POST['password'];

        $sql = "UPDATE users SET
                        username = '{$nome}',
                        email = '{$email}',
                        'password' = '{$senha}',
                    WHERE
                        id=" . $_REQUEST['id'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=usuario_listar';</script>";
        } else {
            print "<script>alert('Falha ao editar');</script>";
            print "<script>location.href='?page=usuario_listar';</script>";

        }
        break;
    case 'excluir':
        $sql = "DELETE FROM users WHERE id=" . $_REQUEST['id'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso');</script>";
            print "<script>location.href='?page=usuario_listar';</script>";
        } else {
            print "<script>alert('Não foi possível');</script>";
            print "<script>location.href='?page=usuario_listar';</script>";
        }
        break;

}
?>