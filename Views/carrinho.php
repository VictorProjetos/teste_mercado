<?php
    include dirname(__DIR__) . '\Includes\header.php';
    include dirname(__DIR__) . '\Includes\navbar.php';
    include dirname(__DIR__) . '\trataInformacoesDoCarrinho.php';
?>
<?php if(count($arrayParaCarrinho) > 0){ ?>
    <body>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Produto vendido</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Valor de unitario (R$)</th>
                    <th scope="col">Valor total sem imposto (R$)</th>
                    <th scope="col">Valor imposto unitário (R$)</th>
                    <th scope="col">Valor total de impostos da venda (R$):</th>
                    <th scope="col">Remover</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($arrayParaCarrinho as $campo => $valor){ 
                ?>
                <tr>
                    <td><?=$campo?></td>
                    <td><?=$valor['quantidadeVendida']?></td>
                    <td><?=$valor['valorUnitario']?></td>
                    <td><?=$valor['valorTotaSemImposto']?></td>
                    <td><?=$valor['valorImpostoUnitario']?></td>
                    <td><?=$valor['valorImpostoTotal']?></td>
                    <td><a href="/excluirProduto.php?id=<?=$valor['idProduto']?>"><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <?php 
                    } 
                ?>
                <tr>
                    <th scope="row" colspan="6">TOTAL DE IMPOSTOS</th>
                    <td><?= "R$ " . $totalImpostosDaCompra?></td>
                </tr>
                <tr>
                    <th scope="row" colspan="6">TOTAL DA VENDA COM IMPOSTOS</th>
                    <td><?= "R$ " . $valorTotalComImposto?></td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <span class="pull-right" style="margin: 10px 10px 0">
            <button type="text" class="btn btn-info" onclick="efetuaVenda()">CONFIRMAR VENDA</button>
        </div>
        <div id="msg" style="margin: 10px 10px 0">
        </div>
        <div id="retornoAjax">
        </div>
    </body>
<?php }else{ ?>
    <div id="msg" style="margin: 10px 10px 0">
        <br><div class='alert alert-success'><strong>SEM PRODUTOS NO CARRINHO</strong></div>
    </div>
<?php } ?>

<script>
    function efetuaVenda(){
        var id = 1;
        $("#msg").html(
            "<br><div class='alert alert-success'><strong>Aguarde...</strong></div>"
        );
        $("#msg").show();
        $.ajax({

            
            url: "/efetuaVenda.php",
            method: "post",
            data: {
                id: id
            },
            success: function(result) {
                $("#msg").html("<br><div class='alert alert-success'><strong>Compra Efetuada com sucesso !</strong></div>");
            },
            error: function(result) {
                $("#msg").hide();
                $("#retornoAjax").html(
                    "<div class='alert alert-danger'><strong>ERRO!</strong> Houve um erro. " +
                        result.responseJSON.message +
                        "</div>"
                );
            }
        });
    }
</script>