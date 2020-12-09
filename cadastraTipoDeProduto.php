<?php
    include dirname(__DIR__) . '\teste_mercado\conexao.php';
    include dirname(__DIR__) . '\teste_mercado\Model\ProdutosModel.php';

    return insereTipoDeProduto($banco, $schema, $_POST['descricao'], $_POST['imposto']);
?>