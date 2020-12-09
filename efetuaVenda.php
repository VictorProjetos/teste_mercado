<?php
    include dirname(__DIR__) . '\teste_mercado\conexao.php';
    include dirname(__DIR__) . '\teste_mercado\Model\ProdutosModel.php';

    $produtosCarrinho = pegaProdutosDoCarrinho($banco, $schema);
    foreach($produtosCarrinho as $produtosCarrinho){
        $produto = consultaUnicoProdutoPeloNome($banco, $schema, $produtosCarrinho['produto_vendido']);
        foreach($produto as $produto){
            
            $novaQuantidade = ($produto['quantidade'] - $produtosCarrinho['quantidade_vendida']); 
        }
        removeQuantidadeVendidaDoEstoque($banco, $schema, $produtosCarrinho['produto_vendido'], $novaQuantidade);   
    }
    apagaOCarrinho($banco, $schema);
    header("Refresh: 5; url=Views/tabelaProdutos.php");

    