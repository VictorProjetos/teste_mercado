<?php
function calculaValorTotal($quantidade, $valor){
    $valorTotal = ($quantidade * $valor);

    return 'R$' . number_format($valorTotal, 2);
}

function calculaValorPorcentagem($valor, $porcentagem){
    $calculo = ($porcentagem / 100) * $valor;

    return 'R$' . number_format($calculo, 2);
}