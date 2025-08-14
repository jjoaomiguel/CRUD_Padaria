<?php
session_start();
include 'db.php';

// Simulação de cliente logado (para teste)
$id_cliente = 1;

// Pega o ID do pedido via GET e valida
$id_pedido = isset($_GET['id_pedido']) ? intval($_GET['id_pedido']) : 0;

if ($id_pedido > 0) {
    $sql = "DELETE FROM pedidos WHERE id_pedido = $id_pedido AND id_cliente = $id_cliente";
    
    if ($conn->query($sql) === TRUE) {
        $msg = "Item removido do carrinho com sucesso!";
        $alertClass = "alert-success";
    } else {
        $msg = "Erro ao remover item: " . $conn->error;
        $alertClass = "alert-danger";
    }
} else {
    $msg = "ID de pedido inválido!";
    $alertClass = "alert-warning";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Item do Carrinho</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div id="flex">
        <a class="navbar-brand" href="#">
            <img src="../assets/logo1.png" alt="Logo" width="40" class="d-inline-block align-text-top">
            Bumba Meu Pão
        </a>
    </div>
</nav>
<body>
<div class="container mt-5">
    <div class="alert <?= $alertClass ?> alert-dismissible fade show" role="alert">
        <?= $msg ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    <a href="carrinho_read.php" class="btn btn-primary">Voltar ao Carrinho</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>