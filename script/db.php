<link rel="stylesheet" href="../style/media.css">
<link rel="stylesheet" href="../style/style.css">

<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "crud_padaria";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexao falhou: " . $conn->connect_error);
}

?>