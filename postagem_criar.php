<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crie sua postagem</title>
</head>

<body>
	<div id="principal">
		<div id="topo">
			<div id="logo">
				<h1> Noticias Eva </h1>
				<h1> Site de forum </h1>
			</div>
			<div id="menu_global" class="menu_global">
				<p align="right"> Ola <?php include "valida_login.php"; ?> </p>
				<?php include "menu_local.php"; ?>
			</div>
		</div>
		<div id="conteudo_especifico">
			<h1> Crie sua Postagem </h1>

			<form method="post" action="postagem_salvar.php" enctype="multipart/form-data">
				<p> Titulo da postagem <input type="text" name="titulo" required> </p>
				<p> Conteudo da postagem <input type="text" name="conteudo" required> </p>
				<p> Tipo da postagem <input type="text" name="tipo" required> </p>
				<input type="submit" value="Postar">
			</form>

		</div>
	</div>
</body>

</html>