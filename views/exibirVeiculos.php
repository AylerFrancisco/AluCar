<?php
require_once 'includes/cabecalho.inc.php'; // Inclui o cabeçalho da página
require_once '../classes/veiculo.inc.php'; // Inclui a classe Veiculo
require_once '../dao/veiculoDao.inc.php'; // Inclui a classe VeiculoDAO

?>

<p>
<h1 class="text-center">Carros Disponíveis para Aluguel</h1>
<p>
<div class="table-responsive">
      <table class="table table-light table-hover">
            <thead class="table-primary">
                  <tr class="align-middle" style="text-align: center">
                        <th width="10%">Placa</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Ano</th>
                        <th>Preço Base</th>
                        <th>Categoria</th>
                        <th>Operações</th>
                  </tr>
            </thead>
            <tbody class="table-group-divider">
                  <?php
                  // Instancia a classe VeiculoDAO para buscar os veículos no banco de dados
                  $veiculoDao = new VeiculoDAO();
                  $veiculos = $veiculoDao->getVeiculos();

                  // Exibição dos veículos na tabela
                  foreach ($veiculos as $veiculo) {
                        echo "<tr align='center'>";
                        echo "<td>" . $veiculo->__get('placa') . "</td>";
                        echo "<td><strong>" . $veiculo->__get('nome') . "</strong></td>";
                        echo "<td>" . $veiculo->__get('fabricante') . "</td>";
                        echo "<td>" . $veiculo->__get('anoFabricacao') . "</td>";
                        echo "<td>R$ " . number_format($veiculo->__get('valorBase'), 2, ',', '.') . "</td>";
                        echo "<td>" . $veiculo->__get('id_categoria') . "</td>";
                        echo "<td><a href='#' class='btn btn-success btn-sm'>Reservar</a> ";
                        echo "<a href='#' class='btn btn-danger btn-sm'>Excluir</a></td>";
                        echo "</tr>";
                  }
                  ?>
            </tbody>
      </table>
</div>

<?php
require_once 'includes/rodape.inc.php'; // Inclui o rodapé da página
?>