<link rel="stylesheet" href="../style/media.css">
<link rel="stylesheet" href="../style/style.css">

<?php

include 'db.php';

$id = $_GET['id_produto'];



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['name'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];

    $sql = "UPDATE produto 
        SET name ='$name',
            preco ='$preco',
            categoria ='$categoria',
            descricao ='$descricao'
        WHERE id_produto=$id";

    if ($conn->query($sql) === true) {
        echo "Registro atualizado com sucesso.
        <a href='produto_read.php'>Ver registros.</a>
        ";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();
    exit(); 
}

$sql = "SELECT * FROM produto WHERE id_produto=$id";
$result = $conn -> query($sql);
$row = $result -> fetch_assoc();


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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

    <form method="POST" action="produto_update.php">

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

    <a href="produto_read.php">Ver Produtos.</a>

</body>

</html>