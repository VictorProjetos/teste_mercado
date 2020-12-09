<?php
    include dirname(__DIR__) . '\Includes\header.php';
    include dirname(__DIR__) . '\Includes\navbar.php';
    include dirname(__DIR__) . '\consultaTodosProdutos.php';
?>
<body>
<a class="nav-link" href="/Views/formCadastraProduto.php"><i class="fas fa-cart-plus"></i> Cadastrar Produto</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade em estoque</th>
                <th scope="col">Valor de unitario</th>
                <th scope="col">Valor total em estoque</th>
                <th scope="col">Valor unitario em impostos</th>
                <th scope="col">Valor total em impostos</th>
                <th scope="col">Editar</th>
                <th scope="col">Remover</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach($arrayParaTabela as $campo => $valor){ 
            ?>
            <tr>
                <td><?=$campo?></td>
                <td><?=$valor['quantidade']?></td>
                <td><?=$valor['valorUnitario']?></td>
                <td><?=$valor['valorTotal']?></td>
                <td><?=$valor['valorUnitarioImposto']?></td>
                <td><?=$valor['valorTotalImposto']?></td>
                <td><a href="/Views/FormEditarProduto.php?id=<?=$valor['idProduto']?>"><i class="far fa-edit"></i></a></td>
                <td><a href="/excluirProduto.php?id=<?=$valor['idProduto']?>"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php 
                } 
            ?>
        </tbody>
    </table>
</body>
