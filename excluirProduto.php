<?php
    include dirname(__DIR__) . '\Teste trabalho\conexao.php';
    include dirname(__DIR__) . '\Teste trabalho\Model\ProdutosModel.php';

    excluiProduto($banco, $schema, $_GET['id']);
    header("Refresh: 0; url=Views/tabelaProdutos.php");
?>