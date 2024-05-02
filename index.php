<?php
include_once "includes/header.php";
include_once "includes/message.php";
include_once "php_actions/db_connection.php";
?>

<header>
	<nav>
		<div class="nav-wrapper yellow darken-4 px-4">
			<a href="#" class="brand-logo">Logo</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="login.php">Login</a></li>
				<li><a href="lista_postagem.php">Notícias</a></li>
				<li><a href="topicos.php">Tópicos</a></li>
				<li><a href="collapsible.html">Sair</a></li>
			</ul>
		</div>
	</nav>
</header>
<main class="container">
	<?php
	$sql = "SELECT * FROM POSTS";
	$result = mysqli_query($connect, $sql);

	?>
	<div class="row">
		<div class="col s2 sidebar">
			<!-- Modal Trigger -->
			<a class="waves-effect waves-light modal-trigger" href="#modal1">Modal</a>

			<p>Sidebar</p>
		</div>
		<div class="col s10 m6">
			<div class="card blue-grey darken-1">
				<div class="card-content white-text">
					<span class="card-title">Card Title</span>
					<p>I am a very simple card. I am good at containing small bits of information.
						I am convenient because I require little markup to use effectively.</p>
				</div>
				<div class="card-action">
					<a href="#">This is a link</a>
					<a href="#">This is a link</a>
				</div>
			</div>
		</div>
	</div>
</main>

<!-- Modal Structure -->
<div id="modal1" class="modal">
	<form action="postagem_salvar.php" method="post">
		<div class="blue modal-title">
			<p>New Discussion</p>
		</div>
		<div class="modal-content">
			<p>title</p>
			<input type="text" placeholder="Enter Title" name="title">
			<textarea name="" id="" cols="60" rows="40" name="content" placeholder="Escreva sua postagem..."></textarea>
		</div>
		<div class="modal-footer">
			<button class="modal-close waves-effect waves-green btn-flat">Enviar</button>
			<!-- <a href="postagem_criar.php" class="modal-close waves-effect waves-green btn-flat">Criar</a> -->
		</div>
	</form>
</div>

<?php
include_once "includes/footer.php"
?>