<?php
include_once"objeto/produtosController.php";

$controller = new ProdutosController();
$produtos = $controller->index();
global $produtos;

?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loja</title>
</head>
<body>

<h1>Loja de Informática</h1>
<h2>Produtos</h2>

<table>
    <tr>
        <td>ID</td>
        <td>Nome</td>
        <td>Descrição</td>
        <td>Quantidade</td>
        <td>Preço</td>
    </tr>
    <?php if($produtos) : ?>
    <?php foreach($produtos as $produto) : ?>
    <tr>
        <td><?php echo $produto->id;?></td>
        <td><?php echo $produto->nome;?></td>
        <td><?php echo $produto->descricao;?></td>
        <td><?php echo $produto->quantidade;?></td>
        <td><?php echo $produto->preco;?></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

</body>
</html>
