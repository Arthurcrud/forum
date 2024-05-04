<header>
    <nav>
        <div class="nav-wrapper px-4 #ffd0dd header-container">
            <a href="#" class="brand-logo">Eva's News</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="../index.php">Home</a></li>
                <?php 
                 if(!isset($_SESSION['user_id'])){
                    echo "
                    <li><a href='../pages/login.php'>Login</a></li>
                    <li><a href='../pages/register.php'>Cadastro</a></li>
                    ";
                 }
                ?>
                <li><a href="../php_actions/logout.php">Sair</a></li>
            </ul>
        </div>
    </nav>
</header>