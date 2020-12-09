<?php
    function insereProduto($banco, $schema, $descricao, $tipoProduto, $quantidade, $valorUnitario){
        try{
            $insert = "INSERT INTO $schema.produtos(id, descricao, tipo_produto_id, quantidade, valor_unitario)
                VALUES (nextval('$schema.produtos_id'::regclass), '$descricao', '$tipoProduto', '$quantidade', '$valorUnitario')";
            
            return pg_exec($banco, $insert);
            
        }catch(\Exception $erro) {
            echo "Erro no insereProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function consultaProdutos($banco, $schema){
        try{
            $query = "SELECT produtos.id, 
            descricao,
            quantidade, 
            valor_unitario,
            (SELECT tipo_descricao FROM $schema.tipo_produto WHERE tipo_produto.id = produtos.tipo_produto_id) as tipo_descricao,
            (SELECT imposto FROM $schema.tipo_produto WHERE tipo_produto.id = produtos.tipo_produto_id) as imposto
            FROM $schema.produtos
            WHERE quantidade > '0'
            ORDER BY produtos.descricao";

            $resultado = pg_exec($banco, $query);
            $resultado = pg_fetch_all($resultado);
            return $resultado;

        }catch(\Exception $erro) {
            echo "Erro no consultaProdutos: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function consultaTipoDeProdutos($banco, $schema){
        try{
            $query = "SELECT * FROM $schema.tipo_produto
            ORDER BY tipo_descricao";

            $resultado = pg_exec($banco, $query);

            $resultado = pg_fetch_all($resultado);

            return $resultado;

        }catch(\Exception $erro) {
            echo "Erro no consultaTipoDeProdutos: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function insereTipoDeProduto($banco, $schema, $descricao, $imposto){
        try{
            $insert = "INSERT INTO $schema.tipo_produto(id, tipo_descricao, imposto)
                VALUES (nextval('$schema.produtos_id'::regclass), '$descricao', '$imposto')";

            return pg_exec($banco, $insert);
            
        }catch(\Exception $erro) {
            echo "Erro no insereTipoDeProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function consultaUnicoProduto($banco, $schema, $id){
        try{
            $query = "SELECT produtos.id, 
            (SELECT tipo_produto_id FROM  $schema.tipo_produto WHERE tipo_produto.id = produtos.tipo_produto_id) as tipo_produto_id,
            descricao,
            quantidade, 
            valor_unitario,
            (SELECT tipo_descricao FROM  $schema.tipo_produto WHERE tipo_produto.id = produtos.tipo_produto_id) as tipo_descricao,
            (SELECT imposto FROM $schema.tipo_produto WHERE tipo_produto.id = produtos.tipo_produto_id) as imposto
            FROM  $schema.produtos
            WHERE produtos.id = '$id'
            ORDER BY produtos.descricao";
            $resultado = pg_exec($banco, $query);
            $resultado = pg_fetch_all($resultado);
            return $resultado;


        }catch(\Exception $erro) {
            echo "Erro no consultaUnicoProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function editaProduto($banco, $schema, $id, $descricao, $tipoProdutoId, $quantidade, $valorUnitario){
        try{
            $query = "UPDATE $schema.produtos
            SET descricao='$descricao', tipo_produto_id='$tipoProdutoId', quantidade='$quantidade', valor_unitario='$valorUnitario'
            WHERE id = '$id'";
            
            return pg_exec($banco, $query);

        }catch(\Exception $erro) {
            echo "Erro no editaProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function excluiProduto($banco, $schema, $id){
        try{
            $query = "DELETE FROM $schema.produtos
            WHERE id = '$id'";

            return pg_exec($banco, $query);

        }catch(\Exception $erro) {
            echo "Erro no excluiProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function editaTipoDeProduto($banco, $schema, $id, $descricao, $imposto){
        try{
            $query = "UPDATE $schema.tipo_produto
            SET tipo_descricao='$descricao', imposto='$imposto'
            WHERE id = '$id'";
            
            return pg_exec($banco, $query);

        }catch(\Exception $erro) {
            echo "Erro no editaTipoDeProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function consultaUnicoTipoDeProduto($banco, $schema, $id){
        try{
            $query = "SELECT * FROM $schema.tipo_produto
            WHERE id = '$id'";
            
            $resultado = pg_exec($banco, $query);
            $resultado = pg_fetch_all($resultado);
            return $resultado;


        }catch(\Exception $erro) {
            echo "Erro no consultaUnicoTipoDeProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function excluiTipoDeProduto($banco, $schema, $id){
        try{
            $query = "DELETE FROM $schema.tipo_produto
            WHERE id = '$id'";

            return pg_exec($banco, $query);

        }catch(\Exception $erro) {
            echo "Erro no excluiProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function consultaUnicoProdutoPeloNome($banco, $schema, $NomeProduto){
        try{
            $query = "SELECT produtos.id, 
            (SELECT tipo_produto_id FROM  $schema.tipo_produto WHERE tipo_produto.id = produtos.tipo_produto_id) as tipo_produto_id,
            descricao,
            quantidade, 
            valor_unitario,
            (SELECT tipo_descricao FROM  $schema.tipo_produto WHERE tipo_produto.id = produtos.tipo_produto_id) as tipo_descricao,
            (SELECT imposto FROM $schema.tipo_produto WHERE tipo_produto.id = produtos.tipo_produto_id) as imposto
            FROM  $schema.produtos
            WHERE produtos.descricao = '$NomeProduto'
            ORDER BY produtos.descricao";
            $resultado = pg_exec($banco, $query);
            $resultado = pg_fetch_all($resultado);
            return $resultado;


        }catch(\Exception $erro) {
            echo "Erro no consultaUnicoProdutoPeloNome: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function insereProdutoNoCarrinho($banco, $schema, $NomeProduto, $quantidade){
        try{
            $query = "INSERT INTO $schema.carrinho(produto_vendido, quantidade_vendida)
            VALUES ('$NomeProduto', '$quantidade')";
            
            return pg_exec($banco, $query);
    


        }catch(\Exception $erro) {
            echo "Erro no consultaUnicoProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function pegaProdutosDoCarrinho($banco, $schema){
        try{
            $query = "SELECT * FROM $schema.carrinho
            ORDER BY produto_vendido";
            
            $resultado = pg_exec($banco, $query);
            $resultado = pg_fetch_all($resultado);
            return $resultado;
            
        }catch(\Exception $erro) {
            echo "Erro no consultaUnicoProduto: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function removeQuantidadeVendidaDoEstoque($banco, $schema, $nomeProduto, $novaQuantidade){
        try{
            $query = "UPDATE $schema.produtos
            SET quantidade='$novaQuantidade'
            WHERE descricao = '$nomeProduto'";
            
            return pg_exec($banco, $query);

        }catch(\Exception $erro) {
            echo "Erro no removeQuantidadeVendidaDoEstoque: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

    function apagaOCarrinho($banco, $schema){
        try{
            $query = "DELETE FROM $schema.carrinho";
            
            return pg_exec($banco, $query);

        }catch(\Exception $erro) {
            echo "Erro no apagaOCarrinho: " . "</br>" . "Erro: " . $erro->getMessage() . "</br>" . "Arquivo: " . $erro->getFile() . "</br>" . "Linha: " . $erro->getLine();
        }
    }

?>