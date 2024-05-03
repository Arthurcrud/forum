<?php
include_once "includes/header.php";
include_once "includes/message.php";
include_once "php_actions/db_connection.php";
?>

<header>
	<nav>
		<div class="nav-wrapper px-4 header-container">
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
	<div class="row" style="margin-top:40px">
		<div class="col s3 main--sidebar">
			<!-- Modal Trigger -->
			<div class="main--sidebar__btn-container">
				<a class="waves-effect waves-light modal-trigger btn blue main--sidebar__btn" style="width:100%; margin-top:15px;" href="#modal1">
					<i class="ph-bold ph-plus"></i>
					<span>
						Novo Post
					</span>
				</a>
			</div>

		</div>
		<div class="col s9">
			<div class="content-header">
				<input type="text" name="" id="" placeholder="Pesquisar no forum">
			</div>
			<?php
			$sql = "SELECT 
			posts.*, 
			users.username, 
			TIMESTAMPDIFF(MINUTE, posts.created_at, NOW()) AS minutes
			FROM 
					posts 
			INNER JOIN 
					users ON posts.user_id = users.id";

			$resultado = mysqli_query($connect, $sql);
			while ($dados = mysqli_fetch_array($resultado)) {
			?>
				<div class="post-container">
					<div class="post-container-content">
						<div class="avatar">
							<span>
								<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
							</span>
						</div>
						<div class="content">
							<p class="content-title"><?php echo $dados['title'] ?></p>
							<p><?php echo $dados['content'] ?></p>
						</div>
						<div class="status">
							<p>
								<span>
									<i class="ph ph-eye"></i>
								</span>
								<span>
									0
								</span>
							</p>
							<p>
								<span>
									<i class="ph ph-chat-circle"></i>
								</span>
								<span>
									0
								</span>
							</p>
						</div>
					</div>
					<p class="user-status-report"><span style="color:blue"><?php echo $dados['username'] ?></span> postado a <span style="font-weight:600;"><?php echo $dados['minutes']?> minutos atrás</span></p>
				</div>
			<?php
			} ?>

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
			<button class="modal-close waves-effect waves-green btn blue">Enviar</button>
			<!-- <a href="postagem_criar.php" class="modal-close waves-effect waves-green btn-flat">Criar</a> -->
		</div>
	</form>
</div>

<?php
include_once "includes/footer.php"
?>