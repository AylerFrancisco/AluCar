<?php
    require_once "includes/cabecalho.inc.php";       
?>
<p>
<h1 class="text-center">Inclusão de Veículo</h1>
<p> 
  
<form class="row g-3" action="#" method="post">
  <div class="col-md-3">
    <label for="vPlaca" class="form-label">Placa</label>
    <input type="text" class="form-control" name="vPlaca">
  </div>
  <div class="col-md-6">
    <label for="vNome" class="form-label">Nome do Veículo</label>
    <input type="text" class="form-control" name="vNome">
  </div>
  <div class="col-md-3">
    <label for="vValorBase" class="form-label">Valor Base</label>
    <input type="text" class="form-control" name="vValorBase">
  </div>
  <div class="col-md-3">
    <label for="vAnoFabricacao" class="form-label">Ano de Fabricação</label>
    <input type="date" class="form-control" name="vAnoFabricacao">
  </div>
  <div class="col-md-3">
    <label for="vFabricante" class="form-label">Fabricante</label>
    <select name="vFabricante" class="form-select">
      <option selected value="0">Escolha...</option>
      <option value="1">Fabricante 1</option>
      <option value="2">Fabricante 2</option>
    </select>
  </div>
  <div class="col-md-3">
    <label for="vMotorizacao" class="form-label">Motorização</label>
    <input type="text" class="form-control" name="vMotorizacao">
  </div>
  <div class="col-md-3">
    <label for="vOpcionais" class="form-label">Opcionais</label>
    <input type="text" class="form-control" name="vOpcionais">
  </div>
  <div class="col-md-3">
    <label for="vCategoria" class="form-label">Categoria</label>
    <select name="vCategoria" class="form-select">
      <option selected value="0">Escolha...</option>
      <option value="1">Categoria 1</option>
      <option value="2">Categoria 2</option>
    </select>
  </div>
  <div class="col-md-4">
    <label for="imagem" class="form-label">Foto do Veículo:</label>
    <input type="file" class="form-control" name="imagem">
  </div>
  <div class="col-12">
    <label for="vDescricao" class="form-label">Descrição do veículo: </label>
    <textarea class="form-control" name="vDescricao" rows="6" style="resize: none"></textarea>    
  </div>
  <div class="col-12">
    <label for="vResumo" class="form-label">Resumo do veículo: </label>
    <textarea class="form-control" name="vResumo" rows="3" style="resize: none"></textarea>    
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Incluir</button>
    <button type="reset" class="btn btn-danger">Cancelar</button>
  </div>
  <input type="hidden" name="opcao" value="1">
</form>

<?php
       require_once 'includes/rodape.inc.php';
?>
