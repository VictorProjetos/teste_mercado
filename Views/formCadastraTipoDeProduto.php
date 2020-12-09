<?php
    include dirname(__DIR__) . '\Includes\header.php';
    include dirname(__DIR__) . '\Includes\navbar.php';
    
?>

<body>
<div class="row">
    <div class="col-lg-12">
        <div class="container" style="margin: auto; margin-top: 5%; width: 60%;border: 3px solid #212529;padding: 10px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" style='text-align: center;'>Cadastro de tipo de produto</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col">
                            <label>Descrição do tipo de produto:</label>
                            <input type="text" class="form-control form-control-sm" name="descricao" id="descricao">
                        </div>
                        <div class="col">
                            <label>Imposto do tipo de produto (%):</label>
                            <input type="number" class="form-control form-control-sm" name="imposto" id="imposto">
                        </div>
                    </div>
                    <div class="row">
                        <span class="pull-right" style="margin: 10px 10px 0">
						<button type="text" class="btn btn-info" onclick="cadastraTipoDeProduto()">CADASTRAR</button>
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
    function cadastraTipoDeProduto(){
        if($('#descricao').val() == "" || $('#imposto').val() == ""){
        $('#msg').html("<div class='alert alert-warning'><strong>Ops ! Todas as informções são obrigatórias.</div>");
        $("#msg").show();
        return;
        }
        $("#msg").html(
            "<br><div class='alert alert-success'><strong>Aguarde...</strong></div>"
        );
        $("#msg").show();
        $.ajax({

            
            url: "/cadastraTipoDeProduto.php",
            method: "post",
            data: {
                descricao: $("#descricao").val(),
                imposto: $("#imposto").val(),
            },
            success: function(result) {
                $("#msg").html("<br><div class='alert alert-success'><strong>Tipo de produto cadastrado com sucesso !</strong></div>");
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