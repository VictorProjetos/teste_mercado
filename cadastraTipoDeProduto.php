<?php
    include dirname(__DIR__) . '\Teste trabalho\conexao.php';
    include dirname(__DIR__) . '\Teste trabalho\Model\ProdutosModel.php';

    return insereTipoDeProduto($banco, $schema, $_POST['descricao'], $_POST['imposto']);
?>