<?php
function error_email(){
    echo 'Tente novamente, email invalido ou senha muito fraca';
};
$error_email = false;

if (isset($_POST['submit'])) {
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $pass = htmlentities($_POST['pass']);

    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $pass) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = true;

    }else {
        $error_email = false;
        echo "Email e Senha valido\n";
        $secure_pass = password_hash($pass, PASSWORD_DEFAULT);

        include_once('../db/connection.php');
        $name = $mysqli->real_escape_string($name);
        $email = $mysqli->real_escape_string($email);
        $pass = $mysqli->real_escape_string($pass);
        
        $mysqli->query("INSERT INTO users(nome,email, senha)VALUES('$name','$email','$pass')");
        echo "cadastrado '$email'";
        header('Location: ../login/login.php');
    };
};
?>
<?php
include('../protect/protect.php');
if ($_SESSION) {
    header('Location: ../usuario/user.php');
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolio</title>
    <link rel="stylesheet" href="../s-home.css">
    <link rel="stylesheet" href="s-cadastro.css">
</head>
<body>
    <header>
        <div id="header-logo-sql">
            <img src="../sets/pngwing.com.png" alt="logo sql">
        </div>
        <a href="../index.php"><h1 id="header-title">DATABASE</h1></a>
        <nav id="header-links">
            <ul>
                <li><a href="../index.php">HOME</a></li>
                <li><a href="../login/login.php">LOGIN</a></li>
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
        <div id="main-cadastro-container">
            <div id="main-cadastro-title">
            <h2>Faça seu Cadastro</h2>
            </div>
            <form action="cadastro.php" method="post">
                <fieldset >
                    <div id="main-cadastro">
                        <div id="main-cadastro-info">
                            <div>
                                <label for="name">NOME</label>
                                <input type="text" name="name" >
                            </div>
                            <div>
                                <label for="email">EMAIL</label>
                                <input type="email" name="email" id="email">
                            </div>
                            <div>
                                <label for="pass">SENHA</label>
                                <input type="password" name="pass" id="pass">
                            </div>
                            <input type="submit" name="submit" value="Cadastrar" id="submit">
                        </div>
                    </div>
                </fieldset>
                <?php 
                if ($error_email) {
                    error_email();
                };
                ?>
            </form>
        </div>
        <div id="main-img-db">
            <img src="../sets/database-icon-logo-illustration-database-storage-symbol-template-for-graphic-and-web-design-collection-free-vector.jpg" alt="">
        </div>
    </main>
    <footer>
        <nav id="footer-links">
            <ul>
                <li><a href="https://github.com/Akshy1">GITHUB</a></li>
                <li><a href="https://linkedin.com/in/breno-rodrigues-0b23081b2">LINKEDIN</a></li>
            </ul>
        </nav>
        <span id="footer-creator-name">Breno Rodrigues</span>
    </footer>
</body>
</html>