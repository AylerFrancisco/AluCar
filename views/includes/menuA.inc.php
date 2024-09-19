<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
  <a href="index.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
    <img src="imagens/logo2.png" alt="Logo" width="100" height="75">
    <h4> Alucar</h4>
  </a>

  <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

    <li><a href="index.php" class="nav-link px-2 link-secondary">Home</a></li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Veículos
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../controlers/controlerCategoria.php?opcao=2">Cadastrar Veículo</a></li> <!-- Nova opção de cadastro -->
        <li><a class="dropdown-item" href="#">Cadastrar Vários</a></li>
        <li><a class="dropdown-item" href="../views/exibirVeiculos.php">Consultar</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li><a class="dropdown-item" href="../controlers/controllerProduto.php?opcao=6">Show Room</a></li>
      </ul>
    </li>

    </li>

    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle link-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Clientes
      </a>
      <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="../views/formSocio.php">Cadastrar</a></li>
        <li><a class="dropdown-item" href="../controlers/controlerSocio.php?opcao=2">Consultar Todos</a></li>
      </ul>
    </li>

    <li><a href="#" class="nav-link px-2 link-dark">Contato</a></li>

    <li>
      <a class="nav-link px-2 link-dark" href="../controlers/controllerCarrinho.php?opcao=4">
        <img src="imagens/cart3.png" alt="">
      </a>
    </li>

  </ul>

  <div class="col-md-3 text-end">
    <?php
    if (!isset($_SESSION["cliente"])) {
    ?>
      <a class="btn btn-outline-primary me-2" role="button"
        href="formLogin.php">Login</a>

    <?php
    } else {
      include_once "modal.inc.php";
    }

    ?>

  </div>
</header>