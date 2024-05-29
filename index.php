<?php
include_once "includes/header.php";
include_once "includes/message.php";
include_once "includes/functions.php";
include_once "includes/navbar.php";
include_once "php_actions/db_connection.php";
?>

<main class="container">
	<div class="row" style="margin-top:40px">
		<div class="col s3 main--sidebar">
			<!-- Modal Trigger -->
			<div class="main--sidebar__btn-container">
				<a class="waves-effect waves-light modal-trigger btn blue main--sidebar__btn"
					style="width:100%; margin-top:15px;" href="#modal1">
					<i class="ph-bold ph-plus"></i>
					<span>
						Novo Post
					</span>
				</a>
			</div>

			<?php
			if (isset($_SESSION['user_id']) && isset($_SESSION['role_id'])) {
				if ($_SESSION['role_id'] == 1) {
					?>
											<div class="main--sidebar__btn-container">
												<a class="waves-effect waves-light modal-trigger btn blue main--sidebar__btn"
													style="width:100%; margin-top:15px;" href="#modal3">
													<i class="ph-bold ph-plus"></i>
													<span>
														Novo aviso
													</span>
												</a>
											</div>
											<?php
				}
			}
			?>
		<div class="list-container">
			<?php
			$sql = "SELECT 
            avisos.*, 
            users.username, 
            TIMESTAMPDIFF(MINUTE, avisos.created_at, NOW()) AS minutes 
        FROM 
            avisos 
        INNER JOIN 
            users ON avisos.user_id = users.id";
			$res = mysqli_query($connect, $sql);

			while ($dados = mysqli_fetch_array($res)) {
				?>
				
						<div class = "avisos-container" id="avisos-<?php echo $dados['id'] ?>">
							<div class = "content">
								<p class="content-title"><?php echo $dados['title'] ?></p>
								<p><?php echo $dados['content'] ?></p>
								<p class="posted-by"><span style="color: blue"><?php echo $dados['username'] ?></span> postado a <span style="font-weight:600"><?php echo $dados['minutes'] ?> minutos atrás</span></p>
							</div>
						</div>
						<hr>
						<?php
			}
			?>
		</div>

		</div>
		<div class="col s9">
			<div class="content-header">
				<input type="text" name="" id="search-input" placeholder="Pesquisar no forum">
			</div>

			<div id="posts">
			<?php

			if (isset($_GET['search'])) {
				$searchParam = clear($_GET['search']);
				$sql = "SELECT 
				posts.*, 
				users.username, 
				TIMESTAMPDIFF(MINUTE, posts.created_at, NOW()) AS minutes
				FROM 
						posts 
				INNER JOIN 
						users ON posts.user_id = users.id
				WHERE posts.content LIKE '%$searchParam%' OR posts.title LIKE '%$searchParam%'";
			} else {
				$sql = "SELECT 
				posts.*, 
				users.username, 
				TIMESTAMPDIFF(MINUTE, posts.created_at, NOW()) AS minutes
				FROM 
						posts 
				INNER JOIN 
						users ON posts.user_id = users.id";
			}

			$resultado = mysqli_query($connect, $sql);

			if (empty($resultado)) {
				echo "<div class='center-align'>
				 <p>Nenhum resultado encontrado para: $searchParam</p>
				</div>";
			}

			while ($dados = mysqli_fetch_array($resultado)) {
				?>
					<div class="post-container" id="post-<?php echo $dados['id'] ?>">
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
						<p class="user-status-report"><span style="color:blue"><?php echo $dados['username'] ?></span> postado a <span
								style="font-weight:600;"><?php echo $dados['minutes'] ?> minutos atrás</span></p>
					</div>
					<?php
			} ?>
		</div>
		</div>
	</div>
</main>

<!-- Modal Criação de Post -->
<div id="modal1" class="modal">
	<form action="php_actions/register_post.php" method="post">
		<div class="blue modal-title">
			<p>New Discussion</p>
		</div>
		<div class="modal-content">
			<p>title</p>
			<input required ="text" placeholder="Enter Title" name="title" id="post-title" class="post-input" >
			<textarea required ="60" rows="40" name="content" placeholder="Escreva sua postagem..." id="post-content" class="post-input" ></textarea>
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-green btn blue" name="btn-enviar" id="btn-enviar">Enviar</button>
			<!-- <a href="postagem_criar.php" class="modal-close waves-effect waves-green btn-flat">Criar</a> -->
		</div>
	</form>
</div>

<!-- Modal Edição de Post -->
<?php
if (isset($_GET['post_id'])) {
	$postId = $_GET['post_id'];
	$sql = "SELECT * FROM posts WHERE id = $postId";
	$resultado = mysqli_query($connect, $sql);

	if (mysqli_num_rows($resultado) > 0 && isset($_SESSION['user_id'])) {
		$post = mysqli_fetch_assoc($resultado);
		$duser = $_SESSION['user_id'];
		$post_owner = $post['user_id'];

		$sql_user = "SELECT role_id FROM users WHERE id = $duser";
		$resultado_user = mysqli_query($connect, $sql_user);
		$user_data = mysqli_fetch_assoc($resultado_user);
		$role_id = $user_data['role_id'];

		?>
			<div id="modal2" class="modal">
				<form action="php_actions/update_post.php" method="post">
					<div class="blue modal-title">
						<p>Edit Discussion</p>
					</div>
					<div class="modal-content">
						<p>title</p>
						<input type="hidden" name="id" value="<?php echo $post['id'] ?>">
						<input required ="text" placeholder="Enter Title" name="title" id="post-title" class="post-input" value="<?php echo $post['title'] ?>" >
						<textarea required ="60" rows="40" name="content" placeholder="Escreva sua postagem..." id="post-content" class="post-input" ><?php echo $post['content'] ?></textarea>
					</div>
					<div class="modal-footer">
						<?php
						if ($duser == $post_owner || $role_id == 1 || $role_id == 3): ?>
										<button class="waves-effect waves-green btn blue" name="btn-enviar" id="btn-enviar">Enviar</button>
										<button type="button" class="waves-effect waves-green btn red delete-btn">Apagar</button>
						<?php endif; ?>
					</div>
				</form>
			</div>
		<?php
	}
}
?>

	 <div id="modal3" class="modal">
	<form action="php_actions/register_avisos.php" method="post">
		<div class="blue modal-title">
			<p>New aviso</p>
		</div>
		<div class="modal-content">
			<p>title</p>
			<input required ="text" placeholder="Enter Title" name="title" id="post-title" class="post-input" >
			<textarea required ="60" rows="40" name="content" placeholder="Escreva sua postagem..." id="post-content" class="post-input" ></textarea>
		</div>
		<div class="modal-footer">
			<button class="waves-effect waves-green btn blue" name="btn-enviar" id="btn-enviar">Enviar</button>
			<!-- <a href="postagem_criar.php" class="modal-close waves-effect waves-green btn-flat">Criar</a> -->
		</div>
	</form>
</div>


<?php
include_once "includes/scripts.php";
include_once "includes/footer.php";
?>