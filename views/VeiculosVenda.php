<?php
include_once 'includes/cabecalho.inc.php';

$carrinho = $_SESSION['carrinho'];
$cont = 1;
$soma = 0;


?>
<h1 class="text-center">Showroom de Veículos</h1>
<p>

<div class="row row-cols-1 row-cols-md-5 g-4">

  <?php
 

  // Percorrendo a lista de veículos
  foreach ($veiculos as $veiculo) {
  ?>

    <div class="col">
      <div class="card">
        <!-- Substituindo o caminho da imagem com o nome da imagem correspondente ao veículo -->
        <img src="imagens/veiculos/<?php echo $veiculo['imagem']; ?>" class="card-img-top" alt="Imagem do veículo">
        <div class="card-body">
          <!-- Título do veículo -->
          <h5 class="card-title"><?php echo $veiculo['nome']; ?></h5>
          <!-- Resumo do veículo -->
          <p class="card-text"><?php echo $veiculo['resumo']; ?></p>
          <!-- Fabricante do veículo -->
          <h6 class="card-text text-end">Marca: <?php echo $veiculo['fabricante']; ?></h6>
          <!-- Preço do veículo -->
          <h4 class="card-title">R$ <?php echo number_format($veiculo['preco'], 2, ',', '.'); ?></h4>
          <!-- Botão de comprar -->
          <div class="text-end">
            <?php echo "<a href='../controlers/controlerCarrinho.php?opcao=1$id=". $veiculo['placa']."' class='btn btn-danger'>Comprar</a>"
            ?>
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