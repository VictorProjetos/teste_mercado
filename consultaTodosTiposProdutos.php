<?php
    include dirname(__DIR__) . '\Teste trabalho\conexao.php';
    include dirname(__DIR__) . '\Teste trabalho\Model\ProdutosModel.php';
    include dirname(__DIR__) . '\Teste trabalho\Controller\ProdutosController.php';

    $tiposDeProduto = consultaTipoDeProdutos($banco, $schema);
?>