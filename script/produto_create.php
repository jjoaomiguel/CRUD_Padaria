<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $preco = $_POST['email'];

    $sql = " INSERT INTO usuarios (name,email) VALUE ('$name','$email')";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
}


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/media.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Create</title>
</head>
<body>
    <header>

        <div class="navbar">
            <div class="flex">
                <img class="icone" src="../assets/logo.png" alt="Logo Bumba Meu Pão">
            </div>
        </div>

    </header>

    <form method="POST" action="create.php">

        <label for="name">Produtos:</label>
        <input type="text" name="name" required>

        <input type="submit" value="Buscar">

        <label for="name">Categorias:</label>
        <input type="text" name="name" required>

        <input type="submit" value="Buscar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>
</html>
