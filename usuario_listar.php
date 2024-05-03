<h1>Listar Usuário</h1>
<?php
    $sql = "SELECT * FROM usuario";
    $res = $conn->query($sql);
    $qtd = $res->num_rows;
    
    if($qtd > 0 ){
        print "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
        print "<table class='table table-bordered table-striped table-hover'>";
        print "<tr>";
        print "<th>#</th>";
        print "<th>Nome do usuário</th>";
        print "<th>E-mail</th>";
        print "<th>Ações</th>";
        print "</tr>";
        while($row = $res->fetch_object()){
            print "<tr>";
            print "<td>".$row->id."</td>";
            print "<td>".$row->username."</td>";
            print "<td>".$row->email."</td>";
            print "<td>
                        <button onclick=\"location.href='?page=usuario_editar&id_usuario=".$row->id."';\" class='btn btn-success'>Editar</button>
                        <button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=usuario_salvar&acao=excluir&id_usuario=".$row->id."';}else{false;}\" class='btn btn-danger'>Excluir</button>
                    </td>";
             print "</tr>";
        }
        print "</table>";
    }else{
        print "<p class='alert alert-danger'>Nenhum resultado encontrado";
    }
?>