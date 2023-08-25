<?php
include('../protect/protect.php');
if (!$_SESSION) {
    header('Location: ../index.php');
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];
$user_email = $_SESSION['user_email'];

?>

<?php
if (isset($_POST['submit'])) {
    $cpf = $_POST['numero-cpf'];
    echo "submit";


    if(!is_numeric($cpf)) {
        $cpf_invalido = "cpf invalido";
    }else {
        include_once('../db/connection.php');
        $cpf = $mysqli->real_escape_string($cpf);

        $sql_code = "SELECT nome, email, cpf, telefone FROM users WHERE cpf = '$cpf' LIMIT 1";
        $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);
        $users = $sql_exec->fetch_assoc();
        if ($sql_exec->num_rows === 1) {
            if ($cpf === $users['cpf']) {
                $nome = $users['cpf'];
                $email = $users['email'];
                $cpf = $users['cpf'];
                $telefone = $users['telefone'];
                echo "$cpf";

                function cpf_encontrado(){
                    echo "<div>
                    <span>Nome: <?php echo "$nome";?></span>
                    <span>Email: <?php echo "$email";?></span>
                    <span>CPF: <?php echo "$cpf";?></span>
                    <span>Telefone: <?php echo "$telefone";?></span>
                    </div>";
                };
            }else {
                $cpf_nao_localizado = "cpf não localizado";
            };
        };
    };
};

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portifolio</title>
    <link rel="stylesheet" href="../s-style.css">
    <link rel="stylesheet" href="s-user.css">
</head>
<body>
    <header>
        <div id="header-logo-sql">
            <img src="../sets/pngwing.com.png" alt="logo sql">
        </div>
        <a href="../index.php"><h1 id="header-title">DATABASE</h1></a>
        <nav id="header-links">
            <ul>
                <span id="header-id">Id de usuário: <?php echo"$user_id";?></span>
            </ul>
        </nav>
    </header>
    <main>
        <div id="main-info-container">
            <div>
                <form action="user.php" method="post">
                        <div>
                            <input type="number" name="numero-cpf">
                            <input type="submit" name="submit" value="Localizar">
                        </div>
                </form>
            </div>
        </div>
            <?php cpf_encontrado();?>
        <div id="main-sair">
            <a href="../protect/logout.php" id="">Sair da conta</a>
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