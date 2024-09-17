<?php
require_once "../dao/clienteDAO.inc.php";
$clienteDao = new ClienteDao();

$opc = (int)$_REQUEST["pOpcao"];

if ($opc == 1) {

    $email = $_REQUEST["pEmail"];
    $senha = $_REQUEST["pSenha"];

 
    $cliente = $clienteDao->Autenticar($email, $senha);

    if ($cliente != null) {
        session_start();
        $_SESSION['cliente'] = $cliente;
            header("Location:../views/exibirCarros.php");

        if ($emCompra == 1) {
            header("Location: controllerCarrinho.php?opcao=5");
        } else {

            if (isset($_SESSION["carrinho"]) && sizeof($_SESSION["carrinho"]) > 0) {
                header("Location: ../views/exibirCarrinho.php");
            } else {
                header("Location: controllerProduto.php?opcao=6");
            }
        }
    } else {
        header("Location: ../views/formLogin.php?erro=1");
    }
} else {
    if ($opc == 2) {
        session_start();
        unset($_SESSION["cliente"]);
        header("Location: ../views/index.php");
    }
}
