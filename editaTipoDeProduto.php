<?php
    include dirname(__DIR__) . '\Teste trabalho\conexao.php';
    include dirname(__DIR__) . '\Teste trabalho\Model\ProdutosModel.php';

    return editaTipoDeProduto($banco, $schema, $_POST['id'], $_POST['descricao'], $_POST['imposto']);
?>