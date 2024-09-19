<?php
require_once '../dao/veiculoDao.inc.php'; // Inclui a classe VeiculoDAO
require_once "../classes/veiculo.inc.php"; // Inclui a classe Veiculo
require_once 'includes/cabecalho.inc.php'; // Inclui o cabeçalho da página


$veiculo = $_SESSION['veiculo'];
$categorias = $_SESSION['categorias'];
var_dump($veiculo);

?>

<p>
<h1 class="text-center">Alteração de Veículo</h1>
<p>

<form class="row g-3" action="../controlers/controlerVeiculo.php" method="post">
  <div class="col-md-2">
    <label for="placa" class="form-label">Placa</label>
    <input type="text" class="form-control" name="placa" value="<?= $veiculo->__get('placa') ?>" readonly>
  </div>
  <div class="col-md-3">
    <label for="nome" class="form-label">Modelo</label>
    <input type="text" class="form-control" name="nome" value="<?= $veiculo->__get('nome') ?>">
  </div>
  <div class="col-md-3">
    <label for="anoFabricacao" class="form-label">Ano de Fabricação</label>
    <input type="text" class="form-control" name="anoFabricacao" value="<?= $veiculo->__get('anoFabricacao') ?>">
  </div>
  <div class="col-md-3">
    <label for="fabricante" class="form-label">Fabricante</label>
    <input type="text" class="form-control" name="fabricante" value="<?= $veiculo->__get('fabricante') ?>">
  </div>
  <div class="col-md-3">
    <label for="motorizacao" class="form-label">Motorização</label>
    <input type="text" class="form-control" name="motorizacao" value="<?= $veiculo->__get('motorizacao') ?>">
  </div>
  <div class="col-md-3">
    <label for="valorBase" class="form-label">Valor Base</label>
    <input type="text" class="form-control" name="valorBase" value="<?= $veiculo->__get('valorBase') ?>">
  </div>
  <div class="col-md-3">
    <label for="id_categoria" class="form-label">Categoria</label>
    <input type="text" class="form-control" name="categoria" value="<?= $veiculo->__get('id_categoria') ?>" readonly>
  </div>

  <div class="col-md-3">
    <label for="opcionais" class="form-label">Opcionais</label>
    <input type="text" class="form-control" name="opcionais" value="<?= $veiculo->__get('opcionais') ?>">
  </div>
  <div class="col-md-12">
    <label for="resumo" class="form-label">Resumo</label>
    <textarea class="form-control" name="resumo" rows="3"><?= $veiculo->__get('resumo') ?></textarea>
  </div>
  <div class="col-md-12">
    <label for="descricao" class="form-label">Descrição</label>
    <textarea class="form-control" name="descricao" rows="6"><?= $veiculo->__get('descricao') ?></textarea>
  </div>
  <div class="col-12 text-center">
    <button type="submit" class="btn btn-success">Atualizar</button>
  </div>
  

  <input type="hidden" name="opcao" value="5">
</form>

<?php
require_once 'includes/rodape.inc.php'; // Inclui o rodapé da página
?>