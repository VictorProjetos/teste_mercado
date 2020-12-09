<?php
    include dirname(__DIR__) . '\Teste trabalho\conexao.php';
    include dirname(__DIR__) . '\Teste trabalho\Model\ProdutosModel.php';

    return insereProduto($banco, $schema, $_POST['descricao'], $_POST['tipoProduto'], $_POST['quantidade'], $_POST['valorUnitario']);
?>