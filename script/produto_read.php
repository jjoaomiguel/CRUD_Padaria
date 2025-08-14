<link rel="stylesheet" href="../style/media.css">
<link rel="stylesheet" href="../style/style.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <h2 class="mb-3">Lista de Produtos</h2>
    <table class="table table-striped table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade em Estoque</th>
                <th>Descrição</th>
                <th>ID Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'db.php';

            $sql = "SELECT * FROM produtos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id_produto']}</td>
                            <td>{$row['nome']}</td>
                            <td>R$ {$row['preco']}</td>
                            <td>{$row['quantidade_estoque']}</td>
                            <td>{$row['descricao']}</td>
                            <td>{$row['id_usuario']}</td>
                            <td>
                                <a class='btn btn-warning btn-sm' href='produto_update.php?id_produto={$row['id_produto']}'>Editar</a>
                                <a class='btn btn-danger btn-sm' href='produto_delete.php?id={$row['id_produto']}'>Excluir</a>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>Nenhum registro encontrado.</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
    <a class="btn btn-success" href="produto_create.php">Inserir novo Produto</a>
</div>