<?php
    include dirname(__DIR__) . '\teste_mercado\conexao.php';
    include dirname(__DIR__) . '\teste_mercado\Model\ProdutosModel.php';

    return editaTipoDeProduto($banco, $schema, $_POST['id'], $_POST['descricao'], $_POST['imposto']);
?>