<?php
function error_email(){
    echo 'Tente novamente, conta não encontrada';
};
$error_email = false;

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass =$_POST['pass'];

    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,20}$/', $pass) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_email = true;
    }else {
        include_once('../db/connection.php');
        $email = $mysqli->real_escape_string($email);
        $pass = $mysqli->real_escape_string($pass);

        $sql_code = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
        $users = $sql_exec->fetch_assoc();
        if ($sql_exec->num_rows === 1) {
            if ($email === $users['email'] and $pass === $users['senha']) {
                $error_email = false;
                if (!isset($_SESSION)) {
                    session_start();
                }
                $_SESSION['user_id'] = $users['id'];
                $_SESSION['user_email'] = $users['email'];
                $_SESSION['user_name'] = $users['nome'];
    
                header("Location: ../usuario/user.php");
            }else {
                $error_email = true;
            };
        };
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
    <link rel="stylesheet" href="s-login.css">
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
                <li><a href="../cadastro/cadastro.php">CADASTRO</a></li>
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
    <div id="main-login-container">
            <div id="main-login-title">
            <h2>Entre na sua conta</h2>
            </div>
            <form action="../login/login.php" method="post">
                <fieldset >
                    <div id="main-login">
                        <div id="main-login-info">
                            <div>
                                <label for="email">EMAIL</label>
                                <input type="email" name="email">
                            </div>
                            <div>
                                <label for="pass">SENHA</label>
                                <input type="password" name="pass">
                            </div>
                            <input type="submit" name="submit" value="Entrar" id="submit">
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