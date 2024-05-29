<header>
    <nav>
        <div class="nav-wrapper px-4 pink header-container">
            <a href="#" class="brand-logo">Eva's News</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
            <?php if (isset($_SESSION['username'])):?>
                <span class="welcome-message">Bem-vindo(a), <?php echo $_SESSION['username'];?>!</span>
  <?php endif;?>

            <li><a href="../index.php">Home</a></li>
                
                <?php
if(isset($_SESSION['user_id']) && isset($_SESSION['role_id'])) {
    if($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 3) {
        echo "<li><a href='../pages/listar_user.php'>Lista de Usuários</a></li>";
    } elseif($_SESSION['role_id'] == 2) {
        echo "<li><a href='../pages/update_profile.php'>Editar Usuário</a></li>";
    }
}

if(!isset($_SESSION['user_id'])) {
    echo "<li><a href='../pages/login.php'>Login</a></li>";
}
?>

                <li><a href='../php_actions/logout.php'>Sair</a></li>
            </ul>
        </div>
    </nav>
</header>