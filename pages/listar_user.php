
<?php		
include_once "../includes/header.php";
include_once "../includes/navbar.php";
include_once "../php_actions/db_connection.php";
include_once "../includes/functions.php";
?>

	

<main class = "container">
    <h1>Listar Usuário</h1>
<?php	

 $sql_pesquisa = "SELECT id, username, email, role_id FROM users";
				 
 $res = mysqli_query ($connect, $sql_pesquisa);
?>
		   
<table class="table text-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Permissao</th>
                    <th scope="col">Acao</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($dado = mysqli_fetch_assoc($res)) {
                        $id = clear($dado['id']);
                        $username = clear($dado['username']);
                        $email = clear($dado['email']);
                        $role_id = clear($dado['role_id']);

                        echo "<tr>";
                        echo "<td>".$dado['id']."</td>";
                        echo "<td>".$dado['username']."</td>";
                        echo "<td>".$dado['email']."</td>";
                        echo "<td>".$dado['role_id']."</td>";
                        echo "<td>
        <a class='btn btn-sm btn-primary' href='editar_user.php?id=$dado[id]' title='Editar'>
        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
            <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
        </svg>
        </a>
         
        <a class='btn btn-sm btn-danger' href='remove_user.php?id=$dado[id]' title='Deletar'>
        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
            <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
        </svg>
    </a>
    </td>";
echo "</tr>";
}
?>
            </tbody>
</table>

</main>
<?php 
 include_once "../includes/footer.php";
?>