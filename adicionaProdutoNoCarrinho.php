<?php
    include dirname(__DIR__) . '\teste_mercado\conexao.php';
    include dirname(__DIR__) . '\teste_mercado\Model\ProdutosModel.php';

    return insereProdutoNoCarrinho($banco, $schema, $_POST['produtoVendido'], $_POST['quantidade']);
?>