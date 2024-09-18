<?php
require_once '../classes/socio.inc.php';

require_once 'includes/cabecalho.inc.php';

$socios = $_SESSION['socios'];
?>

<p>
<h1 class="text-center">Lista de Sócios</h1>
<p>
<div class="table-responsive">
    <table class="table table-light table-hover">
        <thead class="table-primary">
            <tr class="align-middle" style="text-align: center">
                <th>Cpf</th>
                <th>Nome</th>
                <th>RG</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            foreach ($socios as $socio) {
                echo "<tr align='center'>";
                echo "<td>" . $socio->cpf . "</td>";
                echo "<td><strong>" . $socio->nome . "</strong></td>";
                echo "<td>" . $socio->rg . "</td>";
                echo "<td>" . $socio->endereco . "</td>";
                echo "<td>" . $socio->telefone . "</td>";
                echo "<td>" . $socio->email . "</td>";
                echo "<td><a href='../controlers/controlerSocio.php?opcao=4&cpf=" . $socio->cpf . "' class='btn btn-success btn-sm'>Atualizar</a> ";
                echo "<a href= '../controlers/controlerSocio.php?opcao=3&cpf=".$socio->cpf."' class='btn btn-danger btn-sm'>Excluir</a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
require_once 'includes/rodape.inc.php';
?>