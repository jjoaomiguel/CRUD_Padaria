<?php
include 'db.php';

$sql = "SELECT * FROM produtos";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
    <style>
        .card-product {
            transition: transform 0.2s;
        }
        .card-product:hover {
            transform: scale(1.03);
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div id="flex">
        <a class="navbar-brand" href="#">
            <img src="../assets/logo1.png" alt="Logo" width="40" class="d-inline-block align-text-top">
            Bumba Meu Pão
        </a>
        <a href="../index.php" class="btn btn-secondary ms-2">Sair</a>
    </div>
    <div class="ms-auto">
            <a href="carrinho_read.php" class="btn btn-warning">Carrinho</a>
        </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Produtos Disponíveis</h2>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="col-md-4 mb-4">
                        <div class="card card-product shadow-sm h-100">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">'.$row['nome'].'</h5>
                                <p class="card-text flex-grow-1">'.$row['descricao'].'</p>
                                <p class="card-text"><strong>R$ '.$row['preco'].'</strong></p>
                                <p class="card-text">Estoque: '.$row['quantidade_estoque'].'</p>
                                <form method="POST" action="carrinho_read.php">
                                    <input type="hidden" name="id_produto" value="'.$row['id_produto'].'">
                                    <input type="number" name="quantidade" value="1" min="1" max="'.$row['quantidade_estoque'].'" class="form-control mb-2">
                                    <button type="submit" class="btn btn-success">Adicionar ao Carrinho</button <a href="carrinho_read.php"</a>
                                </form>
                            </div>
                        </div>
                    </div>';
            }
        } else {
            echo '<p>Nenhum produto disponível no momento.</p>';
        }
        $conn->close();
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>