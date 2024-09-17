<?php
require_once "../dao/clienteDao.php";
$clienteDao = new ClienteDao();

$opc = (int)$_REQUEST["pOpcao"];

if ($opc == 1) {

    $email = $_REQUEST["pEmail"];
    $senha = $_REQUEST["pSenha"];


    $cliente = $clienteDao->Autenticar($email, $senha);

    
    if ($cliente != null) {
        session_start();
        $_SESSION['cliente'] = $cliente;
            header("Location:../views/exibirProdutos.php");

        
    } else {
        header("Location:../views/formLogin.php?erro=1");
    }
}

if ($opc == 2) {
    session_start();
    unset($_SESSION["cliente"]);
    header("Location: ../views/index.php");
}
