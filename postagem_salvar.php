<!DOCTYPE html>
<html lang="PT-BR">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Criar Postagem</title>
</head>

<body>
	<?php
	$titulo = $_POST["title"];
	$conteudo = $_POST["content"];

	$sql_cadastrar = "INSERT INTO posts (title, content) VALUES ('$titulo', '$conteudo'";

	$sql_resultado_cadastrar = mysqli_query($conectar, $sql_cadastrar);

	if ($sql_resultado_cadastrar == true) {
		$_SESSION['message'] = "Postagem criada com sucesso";
		echo "<script>
					location.href = ('index.php')
				  </script>";
	} else {
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