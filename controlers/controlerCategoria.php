<?php
require_once "../dao/categoriaDao.inc.php";

$opcao = (int)$_REQUEST["opcao"];



if ($opcao == 2 || $opcao == 3) {
    $categoriaDao = new categoriaDAO();
    $categorias = $categoriaDao->getCategorias();

    session_start();

    $_SESSION["categorias"] = $categorias;
    if ($opcao == 3) {
        header("Location: ../views/formVeiculo.php");
    }
    if ($opcao == 2) {
        header("Location: ../views/formVeiculoAtualizar.php");
    }

    exit();
}
