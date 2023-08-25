<?php
include('protect/protect.php');
if ($_SESSION) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];
    $user_email = $_SESSION['user_email'];
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolio</title>
    <link rel="stylesheet" href="s-home.css">
</head>
<body>
    <header>
        <div id="header-logo-sql">
            <img src="sets/pngwing.com.png" alt="logo sql">
        </div>
        <a href="index.php"><h1 id="header-title">DATABASE</h1></a>
        <nav id="header-links">
            <ul>
                <?php 
                if ($_SESSION){
                    echo "<li><a href=\"login/login.php\" id=\"user-name\">$user_name</a></li>";
                }else {
                    echo "
                    <li><a href=\"login/login.php\">LOGIN</a></li>
                    <li><a href=\"cadastro/cadastro.php\">CADASTRAR</a></li>
                    ";
                }
                ?>
            </ul>
        </nav>
    </header>
    <section>
        <nav id="header-bottom-links">
            <ul>
                <li><a href="https://github.com/Akshy1">GITHUB</a></li>
                <li><a href="https://linkedin.com/in/breno-rodrigues-0b23081b2">LINKEDIN</a></li>
            </ul>
        </nav>
    </section>
    <main>
        <div id="main-c-l-container">
            <div id="main-c-l-title">
                <h1>Seja bem vindo!</h1>
            </div>
        
            <div id="main-c-l">
                <div>
                    <a href="cadastro/cadastro.php"><button type="button" id="cadastro">Cadastrar</button></a>
                    <span>ou</span>
                    <a href="login/login.php"><button type="button" id="login">Login</button></a>
                </div>
            </div>
        </div>
        <div id="main-img-db">
            <img src="sets/database-icon-logo-illustration-database-storage-symbol-template-for-graphic-and-web-design-collection-free-vector.jpg" alt="">
        </div>
    </main>
    <article>
        <!--para colocar conteudo de outra site-->
    </article>
    
    <footer>
        <nav id="footer-links">
            <ul>
                <li><a href="https://github.com/Akshy1">GITHUB</a></li>
                <li><a href="https://linkedin.com/in/breno-rodrigues-0b23081b2">LINKEDIN</a></li>
            </ul>
        </nav>
        <span id="footer-creator-name">Breno Rodrigues</span>
        <!--comentario-->
    </footer>
</body>
</html>