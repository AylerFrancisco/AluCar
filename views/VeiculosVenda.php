<?php
require_once '../classes/veiculo.inc.php';
include_once 'includes/cabecalho.inc.php';

?>
<h1 class="text-center">Showroom de Veículos</h1>
<p>

<div class="row row-cols-1 row-cols-md-5 g-4">

  <?php
  $veiculos = $_SESSION['veiculos'];
  var_dump($veiculos);

  // Percorrendo a lista de veículos
  foreach ($veiculos as $veiculo) {
  ?>
    <div class="col">
      <div class="card">

        <div class="card-body">
          <h5 class="card-title"><?= $veiculo->nome ?></h5>
          <p class="card-text"><?= $veiculo->resumo ?></p>
          <h6 class="card-text text-end">Marca: <?= $veiculo->id_categoria ?></h6>
          <h4 class="card-title"><?= number_format($veiculo->valorBase, 2, ',', '.') ?></h4>
          <div class="text-end">
          <?php echo "<a href='../controlers/controlerCarrinho.php?opcao=1&placa=" . $veiculo->getPlaca() . "' class='btn btn-danger'>Comprar</a>" ?>
          </div>
        </div>
      </div>
    </div>


  <?php
    // Fim do loop dos veículos
  }
  ?>

</div>

<?php require_once "includes/rodape.inc.php" ?>