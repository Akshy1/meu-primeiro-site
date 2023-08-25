<?php

$host = "";
$user = "";
$password = "";
$database = "";

$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_SSL_VERIFY_SERVER_CERT, true);
$mysqli->ssl_set(NULL, NULL, "../db/cacert-2023-05-30.pem", NULL, NULL);
$mysqli->real_connect($host, $user, $password, $database);
?>
