<?php
require_once "includes/cabecalho.inc.php";
?>
<p>
<h1 class="text-center">faça sua reserva</h1>
<p>

    <!-- Formulário para reservar veículo -->
<form method="POST" action="processa_reserva.php">
    Veículo ID: <input type="text" name="veiculo_id"><br>
    Cliente ID: <input type="text" name="cliente_id"><br>
    Data Início: <input type="date" name="data_inicio"><br>
    Data Fim: <input type="date" name="data_fim"><br>
    <input type="submit" value="Reservar">
</form>

<!-- Exibir reservas do cliente -->
<form method="POST" action="exibir_reservas.php">
    Cliente ID: <input type="text" name="cliente_id"><br>
    <input type="submit" value="Ver Reservas">
</form>


<?php
require_once 'includes/rodape.inc.php';
?>