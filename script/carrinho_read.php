<?php
session_start();
include 'db.php';

$id_cliente = 1;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_produto'], $_POST['quantidade'])) {
    $id_produto = intval($_POST['id_produto']);
    $quantidade = intval($_POST['quantidade']);

    $data_pedido = date('Y-m-d H:i:s');
    $status = 'Pendente';

    $sql = "INSERT INTO pedidos (quantidade, data_pedido, status, id_cliente, id_produto)
            VALUES ($quantidade, '$data_pedido', '$status', $id_cliente, $id_produto)";
    $conn->query($sql);
}

// Buscar pedidos do cliente
$sql = "SELECT pedidos.id_pedido, produtos.nome, produtos.preco, pedidos.quantidade, pedidos.data_pedido, pedidos.status
        FROM pedidos
        JOIN produtos ON pedidos.id_produto = produtos.id_produto
        WHERE pedidos.id_cliente = $id_cliente";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div id="flex">
        <a class="navbar-brand" href="#">
            <img src="../assets/logo1.png" alt="Logo" width="40" class="d-inline-block align-text-top">
            Bumba Meu Pão
        </a>
    </div>
</nav>
<div class="container mt-4">
    <h2 class="mb-3">Carrinho de Compras</h2>

    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID Pedido</th>
                <th>Produto</th>
                <th>Preço Unitário</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
                <th>Data do Pedido</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $subtotal = $row['preco'] * $row['quantidade'];
                    $total += $subtotal;
                    echo "<tr>
                            <td>{$row['id_pedido']}</td>
                            <td>{$row['nome']}</td>
                            <td>R$ {$row['preco']}</td>
                            <td>{$row['quantidade']}</td>
                            <td>R$ ".number_format($subtotal, 2, ',', '.')."</td>
                            <td>{$row['data_pedido']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a class='btn btn-danger btn-sm' href='carrinho_deletar.php?id_pedido={$row['id_pedido']}'>Remover</a>
                            </td>
                          </tr>";
                }
                echo "<tr>
                        <td colspan='4' class='text-end'><strong>Total:</strong></td>
                        <td colspan='4'><strong>R$ ".number_format($total, 2, ',', '.')."</strong></td>
                      </tr>";
            } else {
                echo "<tr><td colspan='8' class='text-center'>Seu carrinho está vazio.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <a class="btn btn-primary" href="cliente_read.php">Continuar Comprando</a>
    <?php if($total > 0): ?>
        <a class="btn btn-success" href="">Finalizar Compra</a>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>