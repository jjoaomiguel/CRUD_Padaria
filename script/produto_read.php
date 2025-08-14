<link rel="stylesheet" href="../style/media.css">
<link rel="stylesheet" href="../style/style.css">

<?php

include 'db.php';

$sql = "SELECT * FROM produto";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Preço </th>
            <th> Categoria </th>
            <th> Descrição </th>
            <th> Data de Criação </th>
            <th> Ações </th>
        </tr>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                <td> {$row['id_produto']} </td>
                <td> {$row['name']} </td>
                <td> {$row['preco']} </td>
                <td> {$row['categoria']} </td>
                <td> {$row['descricao']} </td>
                <td> {$row['created_at']} </td>
                <td> 
                    <a href='produto_update.php?id_produto={$row['id_produto']}'>Editar<a>
                    <a href='produto_delete.php?id={$row['id_produto']}'>Excluir<a>
                
                </td>
              </tr>   
        ";
    }
    echo "</table>";
} else {
    echo "Nenhum registro encontrado.";
}

$conn -> close();

echo "<a href='produto_create.php'>Inserir novo Produto</a>";