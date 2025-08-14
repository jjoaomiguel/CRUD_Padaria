<link rel="stylesheet" href="../style/media.css">
<link rel="stylesheet" href="../style/style.css">

<?php
include 'db.php';

// Pega o ID do produto via GET e valida
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id > 0) {
    $sql = "DELETE FROM produtos WHERE id_produto=$id";

    if ($conn->query($sql) === TRUE) {
        $msg = "Produto deletado com sucesso!";
        $alertClass = "alert-success";
    } else {
        $msg = "Erro ao deletar: " . $conn->error;
        $alertClass = "alert-danger";
    }
} else {
    $msg = "ID de produto inválido!";
    $alertClass = "alert-warning";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Produto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
<div class="container mt-5">
    <div class="alert <?= $alertClass ?> alert-dismissible fade show" role="alert">
        <?= $msg ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <a href="produto_read.php" class="btn btn-primary">Voltar à lista de produtos</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>