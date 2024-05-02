<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Postagem</title>
</head>
<body>
<?php
	$titulo = $_POST["titulo"];
	$conteudo = $_POST["conteudo"];
	$tipo = $_POST["tipo"];
	
	$sql_cadastrar = "INSERT INTO postagem (tit_pos, cont_pos, tipo_pos) VALUES ('$titulo', '$conteudo', '$tipo'";
	
	
	$sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
	
	if ($sql_resultado_cadastrar == true) {
		echo "<script>
				alert ('$conteudo' cadastrado com sucesso')
			  </script>";
		echo "<script>
					location.href = ('cadastrapost.php')
				  </script>";	  
	}else {
		echo "<script>
						alert ('Ocorreu um erro no servidor ao tentar cadastrar')
					  </script>";
				echo "<script>
						location.href = ('cadastrapost.php')
					  </script>";
	
	}
?>	
</body>
</html>