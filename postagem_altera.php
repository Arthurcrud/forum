<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Alterar Postagem</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/layout.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
</head>

<body>
	<div id="principal">
		<div id="topo">
			<div id="logo">
				<h1> </h1>
				<h1> Amplificadores </h1>
			</div>
			<div id="menu_global" class="menu_global">
				<p align="right"> Olá <?php include "valida_login.php"; ?> </p>
				<?php include "menu_local.php"; ?>
			</div>
		</div>
		<div id="conteudo_especifico">
			<h1> ALTERAÇÃO DE AMPLIFICADORES </h1>

			<?php
			$conectar = mysqli_connect("localhost", "root", "", "4000870");

			$cod = $_GET["codigo"];

			$sql_pesquisa = "SELECT  cod_amp, marca_amp, modelo_amp, tipo_amp, preco_amp, foto_amp
										FROM amplificadores
										 WHERE cod_amp = '$cod'";
			$resultado_pesquisa = mysqli_query($conectar, $sql_pesquisa);

			$registro = mysqli_fetch_row($resultado_pesquisa);
			?>
			<form method="post" action="processa_altera_amp.php">
				<input type="hidden" name="codigo" value="<?php echo "$cod"; ?>">
				<p> Marca: <input type="text" name="marca" required value="<?php echo "$registro[1]"; ?>"> </p>
				<p> Modelo: <input type="text" name="modelo" required value="<?php echo "$registro[2]"; ?>"> </p>
				<p> Preço: <input type="text" name="preco" required value="<?php echo "$registro[4]"; ?>"> </p>
				<p> Foto: <input type="file" name="foto"> </p>
				<p>
					Tipo: <select name="tipo">
						<option value="guitarra" <?php
						if ($registro[3] == "guitarra") {
							echo "selected";
						}
						?>> Guitarra </option>
						<option value="baixo" selected="<?php if ($registro[3] === "baixo")
							echo "true" ?>" </option>

							<option value="violao" <?php
						if ($registro[3] == "violao") {
							echo "selected";
						}
						?>> Violão </option>
					</select>
				</p>
				<p> <input type="submit" value="Alterar Amplificador"> </p>

			</form>
		</div>
	</div>