<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $sql = " INSERT INTO produto (name,preco,categoria,descricao) VALUE ('$name','$preco','$categoria','$descricao')";

    if ($conn->query($sql) === true) {
        echo "Novo produto criado com sucesso.";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Criar Produto</title>
</head>
<body>
    <header>

        <div class="navbar">
            <div class="flex">
                <img class="icone" src="../assets/logo.png" alt="Logo Bumba Meu Pão">
            </div>
        </div>

    </header>

    <br>

    <form method="POST" action="create.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="preco">Preço:</label>
        <input type="text" name="preco" required>

        <label for="categoria">Categoria:</label>
        <input type="text" name="categoria" required>

        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read.php">Ver Produtos.</a>

</body>
</html>
