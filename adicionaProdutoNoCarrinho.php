<?php
    include dirname(__DIR__) . '\Teste trabalho\conexao.php';
    include dirname(__DIR__) . '\Teste trabalho\Model\ProdutosModel.php';

    return insereProdutoNoCarrinho($banco, $schema, $_POST['produtoVendido'], $_POST['quantidade']);
?>