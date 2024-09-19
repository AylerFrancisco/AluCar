<?php
require_once "../classes/socio.inc.php";
require_once "includes/cabecalho.inc.php";
$socio = $_SESSION["cliente"];

?>

<h1 class="text-center">Dados do cliente</h1>

<p>&nbsp;
<div style="font-size: 1.25rem;">
    <p><b>CPF:</b> <?= $socio->cpf ?>
    <p><b>Nome:</b> <?= $socio->nome ?>
    <p><b>RG:</b> <?= $socio->rg ?>
    <p><b>Endereço Completo:</b> <?= $socio->endereco ?>
    <p><b>Telefone:</b> <?= $socio->telefone ?>
    <p><b>Email:</b> <?= $socio->email ?>
        </font>
    <p>
        <hr>
    <p>&nbsp;

        <?php 
        echo "<td><a href='../controlers/controlerSocio.php?opcao=4&cpf=" . $socio->cpf . "' class='btn btn-success btn-sm'>Atualizar</a> ";
        echo "<a href='../controlers/controlerSocio.php?opcao=7&cpf=".$socio->cpf."' class='btn btn-danger btn-sm'>Excluir</a></td>";
        ?>
</div>

<?php require_once "includes/rodape.inc.php" ?>