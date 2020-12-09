<?php
    include dirname(__DIR__) . '\teste_mercado\conexao.php';
    include dirname(__DIR__) . '\teste_mercado\Model\ProdutosModel.php';
    include dirname(__DIR__) . '\teste_mercado\Controller\ProdutosController.php';

    $produtos = consultaProdutos($banco, $schema);
    $arrayParaTabela = [];
    $i = 0;
    foreach($produtos as $produtos){
        
        //Valor Total dos produtos em estoque.
        $quantidade = $produtos['quantidade'];
        $valorUnitario = str_replace(',', '.', $produtos['valor_unitario']);
        $valorTotal = calculaValorTotal($quantidade, $valorUnitario);

        $arrayParaTabela[$produtos['descricao']]['quantidade'] = $quantidade;
        $arrayParaTabela[$produtos['descricao']]['valorUnitario'] = "R$ " . $valorUnitario;
        $valorTotal = str_replace(',', '', $valorTotal);
        $arrayParaTabela[$produtos['descricao']]['valorTotal'] = $valorTotal;

        //Valor porcentual do valor unitario.
        $imposto = $produtos['imposto'];
        $valorImpostosUnitario = calculaValorPorcentagem($valorUnitario, $imposto);

        $arrayParaTabela[$produtos['descricao']]['valorUnitarioImposto'] = $valorImpostosUnitario;

        //Valor total em impostos
        $valorTotalParaImposto = str_replace('R$', '', $valorTotal);
        $valorImpostoTotal = calculaValorPorcentagem($valorTotalParaImposto, $imposto);

        $arrayParaTabela[$produtos['descricao']]['valorTotalImposto'] = $valorImpostoTotal;

        $arrayParaTabela[$produtos['descricao']]['idProduto'] = $produtos['id'];
        
    }
?>