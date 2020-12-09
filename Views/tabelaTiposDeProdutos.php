<?php
    include dirname(__DIR__) . '\Includes\header.php';
    include dirname(__DIR__) . '\Includes\navbar.php';
    include dirname(__DIR__) . '\consultaTodosTiposProdutos.php';

?>
<body>
    <a class="nav-link" href="/Views/formCadastraTipoDeProduto.php"><i class="fas fa-cart-plus"></i> Cadastrar tipo de produto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Tipo de Produto</th>
                <th scope="col">Imposto (%)</th>
                <th scope="col">Editar</th>
                <th scope="col">Remover</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($tiposDeProduto as $tiposDeProduto){ 
            ?>
            <tr>
                <td><?=$tiposDeProduto['tipo_descricao']?></td>
                <td><?=$tiposDeProduto['imposto'] . "%"?></td>
                <td><a href="/Views/formEditarTipoDeProduto.php?id=<?=$tiposDeProduto['id']?>"><i class="far fa-edit"></i></a></td>
                <td><a href="/excluirTipoDeProduto.php?id=<?=$tiposDeProduto['id']?>"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php 
                } 
            ?>
        </tbody>
    </table>
</body>