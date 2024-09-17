<?php
require_once 'includes/cabecalho.inc.php'; // Inclui o cabeçalho da página
require_once '../classes/veiculos.inc.php'; // Inclui a classe Carro

?>

<p>
<h1 class="text-center">Carros Disponíveis para Aluguel</h1>
<p>
<div class="table-responsive">
      <table class="table table-light table-hover">
            <thead class="table-primary">
                  <tr class="align-middle" style="text-align: center">
                        <th width="10%">ID</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Ano</th>
                        <th>Preço por Dia</th>
                        <th>Disponibilidade</th>
                        <th>Operações</th>
                  </tr>
            </thead>
            <tbody class="table-group-divider">
                  <?php
                  // Instanciação dos carros
                  $carros = [
                        
                  ];

                  // Exibição dos carros na tabela
                  foreach ($carros as $carro) {
                        echo "<tr align='center'>";
                        echo "<td>" . $carro->__get('id') . "</td>";
                        echo "<td><strong>" . $carro->__get('modelo') . "</strong></td>";
                        echo "<td>" . $carro->__get('marca') . "</td>";
                        echo "<td>" . $carro->__get('ano') . "</td>";
                        echo "<td>R$ " . number_format($carro->__get('precoPorDia'), 2, ',', '.') . "</td>";
                        echo "<td>" . ($carro->__get('disponibilidade') ? 'Disponível' : 'Indisponível') . "</td>";
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