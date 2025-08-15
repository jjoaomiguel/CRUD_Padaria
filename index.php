<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link rel="stylesheet" href="../style/media.css">
    <link rel="stylesheet" href="../style/style.css">
    <a href="../script/produto_create.php"></a>
    <a href="../script/db.php"></a>
    <a href="../script/delete.php"></a>
    <a href="../script/produto_read.php"></a>
    <a href="../script/produto_update.php"></a>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
    <title>Bumba Meu Pão</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="./assets/logo1.png" alt="Logo" width="40" class="d-inline-block align-text-top me-2">
            Bumba Meu Pão
        </a>
    </div>
</nav><br>

<div class="container login-options text-center">
    <h1 class="mb-5">Escolha sua entrada</h1>
    <div class="d-grid gap-3 col-6 mx-auto">
        <button class="btn btn-success btn-login" onclick="window.location.href='./script/produto_create.php'">
            Gerente
        </button>
        <button class="btn btn-warning btn-login" onclick="window.location.href='./script/cliente_read.php'">
            Cliente
        </button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>