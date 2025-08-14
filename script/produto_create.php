<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $quantidade_estoque = $_POST['quantidade_estoque'];
    $id_usuario = 1;
    
    $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade_estoque, id_usuario) 
            VALUES ('$nome', '$descricao', '$preco', '$quantidade_estoque', '$id_usuario')";

    if ($conn->query($sql) === true) {
        $msg = "Novo produto criado com sucesso.";
        $alertClass = "alert-success";
    } else {
        $msg = "Erro: " . $conn->error;
        $alertClass = "alert-danger";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Criar Produto</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="../assets/logo1.png" alt="Logo" width="40" class="d-inline-block align-text-top me-2">
            Bumba Meu Pão
        </a>

        <div class="ms-auto">
            <a href="../index.php" class="btn btn-secondary">Sair</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <!-- Mensagem de alerta -->
    <?php if(isset($msg)): ?>
        <div class="alert <?= $alertClass ?> alert-dismissible fade show" role="alert">
            <?= $msg ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Card do Formulário -->
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Adicionar Novo Produto</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="produto_create.php">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control" name="nome" id="nome" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label">Descrição:</label>
                    <input type="text" class="form-control" name="descricao" id="descricao" required>
                </div>

                <div class="mb-3">
                    <label for="preco" class="form-label">Preço:</label>
                    <input type="text" class="form-control" name="preco" id="preco" required>
                </div>

                <div class="mb-3">
                    <label for="quantidade_estoque" class="form-label">Quantidade no Estoque:</label>
                    <input type="number" class="form-control" name="quantidade_estoque" id="quantidade_estoque" required>
                </div>

                <button type="submit" class="btn btn-success">Adicionar</button>
                <a href="produto_read.php" class="btn btn-secondary ms-2">Ver Produtos</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>