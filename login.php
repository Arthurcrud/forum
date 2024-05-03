<?php
include_once "includes/header.php";
include_once "includes/message.php";
include_once "php_actions/db_connection.php";
?>

<header>
	<nav>
		<div class="nav-wrapper px-4 #ffd0dd header-container">
			<a href="#" class="brand-logo">Eva's News</a>
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><a href="index.php">Home</a></li>
			    <li><a href="usuario_cadastrar.php">Cadastro</a></li>
			    <li><a href="login.php">Login</a></li>
				<li><a href="logout.php">Sair</a></li>
			</ul>
		</div>
	</nav>
</header>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Senha incorreta. Por favor, tente novamente.";
        }
    } else {
        $error_message = "Usuário não encontrado. Por favor, verifique seu e-mail.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
