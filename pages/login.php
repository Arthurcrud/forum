<?php
include_once "../includes/header.php";
include_once "../includes/navbar.php";
include_once "../includes/message.php";
include_once "../php_actions/db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connect, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $user_password = hash('sha256', $password);
        var_dump($user_password);
        if ($user_password == $user["password"]) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            header("Location: ../index.php");
            exit();
        } else {
            $error_message = "Senha incorreta. Por favor, tente novamente.";
        }
    } else {
        $error_message = "Usuário não encontrado. Por favor, verifique seu e-mail.";
    }
}
?>

    <main class="container">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
                                <p><?php echo $error_message; ?></p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" class="input-field"><br><br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" class="input-field" required><br><br>
            <button type="submit" class="btn waves-effect waves-light blue">Entrar</button>
            <a href="register.php" class="btn waves-effect waves-light">Criar conta</a>
        </form>

    </main>

    <?php
    include_once '../includes/footer.php';
    ?>