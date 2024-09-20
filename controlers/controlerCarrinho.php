<?php
require_once '../dao/veiculoDao.inc.php';
require_once "../classes/exemplar.inc.php";
$opcao = null;
$veiculoDAO = null;

if (isset($_REQUEST["opcao"])) {
    $opcao = $_REQUEST["opcao"];
    $veiculoDAO = new VeiculoDAO();
}

if ($opcao == 1) {
    $placa = $_REQUEST["placa"];

    $veic = $veiculoDAO->getVeiculo($placa);
    $exemp = new Exemplar($veic);
    session_start();
    if (!isset($_SESSION["carrinho"])) {
        $_SESSION["carrinho"] = [];
    }

    $_SESSION["carrinho"][] = $item;

    header("Location: ../views/exibirCarrinho.php");
}

if ($opcao == 2) {
    $index = (int)$_REQUEST['index'];
    session_start();

    $carrinho = $_SESSION['carrinho'];
    unset($carrinho[$index]);
    sort($carrinho);
    $_SESSION['carrinho'] = $carrinho;

    header("Location: controlerCarrinho.php?opcao=4");
}
if ($opcao == 3) {

    session_start();

    unset($_SESSION['carrinho']);

    header("Location:controlerVeiculo.php?opcao=6");
}

if ($opcao == 4) {
    session_start();

    if (!isset($_SESSION['carrinho']) || sizeof($_SESSION['carrinho']) == 0)
        header("Location:../views/exibirCarrinho.php?status=1");
    else
        header("Location:../views/exibirCarrinho.php");
}
