<?php
require_once '../classes/veiculo.inc.php';
include_once 'includes/cabecalho.inc.php';

$veiculos = $_SESSION['veiculos'];
?>

<h1 class="text-center">Showroom de Veículos</h1>
<p>
<p>
  <label for="placa">Placa</label>
  <input type="text" id="pPlaca" name="pPlaca" placeholder="Digite a placa do veículo">
  <a href='../controlers/controlerVeiculo.php?opcao=8' class="btn btn-success btn-sm">Pesquisar</a>

  <label for="nome">Nome</label>
  <input type="text" id="pNome" name="pNome" placeholder="Digite o nome do veículo">
  <a href='../controlers/controlerVeiculo.php?opcao=9' class="btn btn-success btn-sm">Pesquisar</a>

  <label for="fabricante">Fabricante</label>
  <input type="text" id="pFabricante" name="pFabricante" placeholder="Digite o nome do fabricante">
  <a href='../controlers/controlerVeiculo.php?opcao=10' class="btn btn-success btn-sm">Pesquisar</a>

</p><label for="motorizacao">Motorização</label>
<input type="text" id="pMotorizacao" name="pMotorizacao" placeholder="Digite a motorização (ex: 1.6, 2.0)">
<a href='../controlers/controlerVeiculo.php?opcao=11' class="btn btn-success btn-sm">Pesquisar</a>
<p></p>
<div class="row row-cols-1 row-cols-md-5 g-4">


  <?php


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