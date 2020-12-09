<?php
    include dirname(__DIR__) . '\Teste trabalho\conexao.php';
    include dirname(__DIR__) . '\Teste trabalho\Model\ProdutosModel.php';
    include dirname(__DIR__) . '\Teste trabalho\Controller\ProdutosController.php';
    error_reporting(0);
    $produtosCarrinho = pegaProdutosDoCarrinho($banco, $schema);
    $arrayParaCarrinho = [];
    $totalImpostosDaCompra = 0;
    $valorTotalComImposto = 0;
    foreach($produtosCarrinho as $produtosCarrinho){

        //quantidade
        $arrayParaCarrinho[$produtosCarrinho['produto_vendido']]['quantidadeVendida'] = $produtosCarrinho['quantidade_vendida'];

        $produto = consultaUnicoProdutoPeloNome($banco, $schema, $produtosCarrinho['produto_vendido']);
        foreach($produto as $produto){
            //valor unitario
            $arrayParaCarrinho[$produtosCarrinho['produto_vendido']]['valorUnitario'] = $produto['valor_unitario'];
            //Imposto valor unitario
            $valorUnitario = str_replace(',', '.', $produto['valor_unitario']);
            $valorImpostoUnitario = calculaValorPorcentagem($valorUnitario, $produto['imposto']);
            $arrayParaCarrinho[$produtosCarrinho['produto_vendido']]['valorImpostoUnitario'] = $valorImpostoUnitario;

            //Imposto total do produto x quantidade
            $valorTotalQuantidade = calculaValorTotal($produtosCarrinho['quantidade_vendida'], $valorUnitario);
            $valorTotalQuantidade = str_replace('R$', '', $valorTotalQuantidade);
            $valorImpostoTotal = calculaValorPorcentagem($valorTotalQuantidade, $produto['imposto']);
            $arrayParaCarrinho[$produtosCarrinho['produto_vendido']]['valorImpostoTotal'] = $valorImpostoTotal;
            $valorImpostoTotal = str_replace('R$', '', $valorImpostoTotal);

            //valorTotalSemImposto
            $valorTotalSemImposto = calculaValorTotal($produtosCarrinho['quantidade_vendida'], $valorUnitario);
            $arrayParaCarrinho[$produtosCarrinho['produto_vendido']]['valorTotaSemImposto'] = $valorTotalSemImposto;


            //TotalDeImpostos
            $totalImpostosDaCompra = $totalImpostosDaCompra + $valorImpostoTotal;

            //valorTotalComImposto
            $valorComImpostos = $valorTotalQuantidade + $valorImpostoTotal;
            $valorTotalComImposto = $valorTotalComImposto + $valorComImpostos;
        }  
    }
