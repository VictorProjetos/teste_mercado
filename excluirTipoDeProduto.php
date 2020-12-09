<?php
    include dirname(__DIR__) . '\teste_mercado\conexao.php';
    include dirname(__DIR__) . '\teste_mercado\Model\ProdutosModel.php';

    excluiTipoDeProduto($banco, $schema, $_GET['id']);
    header("Refresh: 0; url=Views/tabelaTiposDeProdutos.php");
?>