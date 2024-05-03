<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $content = $_POST['content'];
        $tittle = $_POST['tittle'];

        $sql = "INSERT INTO posts (content, tittle) 
                    VALUES ('{$content}', '{$tittle}')";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Cadastrou com sucesso');</script>";
            print "<script>location.href='?page=postagem_listar';</script>";
        } else {
            print "<script>alert('Não foi possível');</script>";
            print "<script>location.href='?page=postagem_listar';</script>";
        }
        break;


    case 'editar':
        $content = $_POST['content'];
        $tittle = $_POST['tittle'];

        $sql = "UPDATE posts SET
                        content = '{$content}',
                        tittle = '{$tittle}',
                    WHERE
                        id=" . $_REQUEST['id'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Editado com sucesso');</script>";
            print "<script>location.href='?page=postagem_listar';</script>";
        } else {
            print "<script>alert('Falha ao editar');</script>";
            print "<script>location.href='?page=postagem_listar';</script>";

        }
        break;
    case 'excluir':
        $sql = "DELETE FROM posts WHERE id=" . $_REQUEST['id'];

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('Excluiu com sucesso');</script>";
            print "<script>location.href='?page=postagem_listar';</script>";
        } else {
            print "<script>alert('Não foi possível');</script>";
            print "<script>location.href='?page=postagem_listar';</script>";
        }
        break;

}
?>