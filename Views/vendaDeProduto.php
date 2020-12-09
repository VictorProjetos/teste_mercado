<?php
    include dirname(__DIR__) . '\Includes\header.php';
    include dirname(__DIR__) . '\Includes\navbar.php';
    include dirname(__DIR__) . '\conexao.php';
    include dirname(__DIR__) . '\Model\ProdutosModel.php';

    $produtos = consultaProdutos($banco, $schema);
?>
<body>
<div class="row">
    <div class="col-lg-12">
        <div class="container" style="margin: auto; margin-top: 5%; width: 60%;border: 3px solid #212529;padding: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style='text-align: center;'>VENDER</h3>
                </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col">
                                    <label>Produto à ser vendido:</label>
                                    <select class="form-control" name="produtoVendido" id="produtoVendido">
                                        <?php 
                                            foreach($produtos as $produtos){ ?>
                                                <option value="<?=$produtos['descricao']?>"><?=$produtos['descricao']?></option>
                                        <?php    }
                                        ?>
                                    </select>
                                </div>
                                <div class="col">
                                    <label>Quantidade à vender:</label>
                                    <input type="number" class="form-control form-control-sm" name="quantidade" id="quantidade" required>
                            </div>  
                        </div>
                        <div >
                            <div id= "divInput" class="col">
                                <input value='0' type="hidden" name="inputnovo" id="inputnovo">
                            </div> 
                        </div>
                        <div class="row">
                            <span class="pull-right" style="margin: 10px 10px 0">
                            <button type="button" onclick="adicionaNoCarrinho()" class="btn btn-info">ADICIONAR NO CARRINHO</button>
                        </div>
                    <div id="msg" style="margin: 10px 10px 0">
                    </div>
                    <div id="retornoAjax">
                    </div>
                </div>   
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#produtoVendido').select2();
    });
    
    function adicionaNoCarrinho(){
        if($("#quantidade").val() == ""){
            $('#msg').html("<div class='alert alert-warning'><strong>Você deve informar a quantidade antes de adicionar o produto no carrinho.</div>");
            $("#msg").show();
            return;
        }
        $.ajax({
            url: "/adicionaProdutoNoCarrinho.php",
            method: "post",
            data: {
                produtoVendido: $("#produtoVendido").val(),
                quantidade: $("#quantidade").val(),
            },
            success: function(result) {
                $("#msg").html("<br><div class='alert alert-success'><strong>Produto adiconado ao carrinho com sucesso !</strong></div>");
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

</body>
