<?php
    include dirname(__DIR__) . '\Includes\header.php';
    include dirname(__DIR__) . '\Includes\navbar.php';
    include dirname(__DIR__) . '\conexao.php';
    include dirname(__DIR__) . '\Model\ProdutosModel.php';
    $tipoDeProduto = consultaTipoDeProdutos($banco, $schema);
?>
<body>
<div class="row">
    <div class="col-lg-12">
        <div class="container" style="margin: auto; margin-top: 5%; width: 60%;border: 3px solid #212529;padding: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style='text-align: center;'>Cadastro de Produto</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col">
                            <label>Descrição do produto:</label>
                            <input type="text" class="form-control form-control-sm" name="descricao" id="descricao">
                        </div>
                        <div class="col">
                            <label>Tipo de produto:</label>
                            <select class="form-control" name="tipoProduto" id="tipoProduto">
                                <?php 
                                    foreach($tipoDeProduto as $tipo){ ?>
                                        <option value="<?=$tipo['id']?>"><?=$tipo['tipo_descricao']?></option>
                                <?php    }
                                ?>
                            </select>
                        </div>
                        <div class="col">
                            <label>Quantidade:</label>
                            <input type="number" class="form-control form-control-sm" name="quantidade" id="quantidade">
                        </div>
                        <div class="col">
                            <label>Valor unitário (R$):</label>
                            <input class="form-control form-control-sm" type="text" name="valorUnitario" id="valorUnitario"/>
                        </div>
                    </div>
                    <div class="row">
                        <span class="pull-right" style="margin: 10px 10px 0">
						<button type="text" class="btn btn-info" onclick="cadastraProduto()">CADASTRAR</button>
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
        $('#tipoProduto').select2();
    });
    $("#valorUnitario").maskMoney({
        prefix:'R$ ', 
        allowNegative: true,
        thousands:'.',
        decimal:',',
        affixesStay: false
    });

    function cadastraProduto(){
        if($('#descricao').val() == "" || $('#tipoProduto').val() == "" || $('#quantidade').val() == "" || $('#valorUnitario').val() == ""){
            $('#msg').html("<div class='alert alert-warning'><strong>Ops ! Todas as informações são obrigatórias.</div>");
            $("#msg").show();
            return;
        }
        $("#msg").html(
            "<br><div class='alert alert-success'><strong>Aguarde...</strong></div>"
        );
        $("#msg").show();
        $.ajax({

            
            url: "/cadastraProduto.php",
            method: "post",
            data: {
                descricao: $("#descricao").val(),
                tipoProduto: $("#tipoProduto").val(),
                quantidade: $("#quantidade").val(),
                valorUnitario: $("#valorUnitario").val(),
            },
            success: function(result) {
                $("#msg").html(result);
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