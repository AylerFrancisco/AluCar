<?php
require_once '../dao/clienteDao.inc.php';
$opcao = $_REQUEST['pOpcao'];


if ($opcao == 1) {
    $email = $_REQUEST['pEmail'];
    $senha = $_REQUEST['pSenha'];
    $clienteDao = new ClienteDao();
    $cliente = $clienteDao->autenticar($email, $senha);

    if ($cliente != NULL) {
        session_start();
        $_SESSION['cliente'] = $cliente;
        header("Location:../views/exibirCarros.php");
    } else {
        header("Location:../views/formLogin.php?erro=1");
    }
}

if ($opcao == 2) {

    session_start();

    unset($_SESSION['clienteLogado']);

    header("Location:../views/index.php");
}
?>