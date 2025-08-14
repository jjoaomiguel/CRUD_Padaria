<?php
include 'db.php';

$id = isset($_GET['id_produto']) ? intval($_GET['id_produto']) : 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $quantidade_estoque = $_POST['quantidade_estoque'];

    $sql = "UPDATE produtos 
            SET nome='$nome', preco='$preco', descricao='$descricao', quantidade_estoque='$quantidade_estoque' 
            WHERE id_produto=$id";

    if ($conn->query($sql) === TRUE) {
        $msg = "Produto atualizado com sucesso!";
        $alertClass = "alert-success";
    } else {
        $msg = "Erro ao atualizar: " . $conn->error;
        $alertClass = "alert-danger";
    }
}

$sql = "SELECT * FROM produtos WHERE id_produto=$id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>

<div class="container mt-5">
    <h2>Editar Produto</h2>

    <?php if(isset($msg)): ?>
        <div class="alert <?= $alertClass ?> alert-dismissible fade show" role="alert">
            <?= $msg ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($row['nome']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="<?= $row['preco'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="quantidade_estoque" class="form-label">Quantidade no Estoque:</label>
            <input type="number" class="form-control" id="quantidade_estoque" name="quantidade_estoque" value="<?= $row['quantidade_estoque'] ?>" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required><?= htmlspecialchars($row['descricao']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
        <a href="produto_read.php" class="btn btn-secondary ms-2">Voltar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>