<?php
    include dirname(__DIR__) . '\Includes\header.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/Views/index.php"><strong>Início</strong></a>
  <button class="navbar-toggler" type="button">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/Views/tabelaProdutos.php"><i class="fas fa-cubes"></i> Produtos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Views/tabelaTiposDeProdutos.php"><i class="fas fa-cubes"></i> Tipos de produtos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Views/vendaDeProduto.php"><i class="fas fa-shopping-basket"></i> Venda</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/Views/carrinho.php"><i class="fas fa-shopping-cart"></i> Carrinho</a>
      </li>
    </ul>
  </div>
</nav>