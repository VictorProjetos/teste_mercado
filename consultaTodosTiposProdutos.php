<?php
    include dirname(__DIR__) . '\teste_mercado\conexao.php';
    include dirname(__DIR__) . '\teste_mercado\Model\ProdutosModel.php';
    include dirname(__DIR__) . '\teste_mercado\Controller\ProdutosController.php';

    $tiposDeProduto = consultaTipoDeProdutos($banco, $schema);
?>