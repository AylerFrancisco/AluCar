<?php
require_once '../classes/exemplar.inc.php';
require_once 'includes/cabecalho.inc.php';

$carrinho = $_SESSION['carrinho'];

?>

<h1 class="text-center">Carrinho de compra</h1>
<p>
      <?php
      if (isset($_REQUEST['status'])) {

            require_once "includes/carrinhoVazio.inc.php";
      } else {

      ?>
<div class="table-responsive">
      <table class="table table-ligth table-striped">
            <thead class="table-danger">
                  <tr class="align-middle" style="text-align: center">
                        <th witdh="10%">Item No</th>
                        <th>Ref.</th>
                        <th>Nome</th>
                        <th>Fabricante</th>
                        <th>Preço</th>
                        <th>Qde.</th>
                        <th>Total</th>
                        <th>Remover</th>
                  </tr>
            </thead>
            <tbody class="table-group-divider">
                  <?php
                  $cont = 1;
                  $soma = 0;
                  var_dump($carrinho);
                  foreach ($carrinho as $item) {
                        //var_dump($item)
                  ?>
                        <tr class="align-middle" style="text-align: center">
                              <td><?= $cont ?></td>
                              <td><?= $item->getVeiculo()->getPlaca() ?></td>
                              <td><?= $item->getNome() ?></td>
                              <td><?= $item->getIdCategoria() ?></td>
                              <td><?= $item->getValorBase() ?></td>
                              <td><?= $item->getDisponibilidade() ?></td>
                              <td><?= "R$" . $item->getValorExemplar() ?></td>
                              <td><a href="#" class='btn btn-danger btn-sm'>X</a></td>

                        </tr>

                        <!-- percurso termina aqui -->
                  <?php

                        $cont++;
                        $soma += $item->getValorExemplar();
                  } ?>
                  <tr align="right">
                        <td colspan="8">
                              <font face="Verdana" size="4" color="red"><b>R$ <?= $soma ?></b></font>
                        </td>
                  </tr>
      </table>
      <div class="container text-center">
            <div class="row">
                  <div class="col">
                        <a class="btn btn-warning" role="button" href="#"><b>Continuar comprando</b></a>
                  </div>
                  <div class="col">
                        <a class="btn btn-danger" role="button" href="#"><b>Esvaziar carrinho</b></a>
                  </div>
                  <div class="col">
                        <a class="btn btn-success" role="button" href="#"><b>Finalizar compra</b></a>
                  </div>
            </div>
      </div>

<?php
            require_once 'includes/rodape.inc.php';
      } ?>