<?php
require_once '../dao/veiculoDao.inc.php';
require_once "../classes/veiculo.inc.php";



if($opcao == 1){
    $placa = (string)$_REQUEST['placa'];

    $veiculoDAO= new VeiculoDAO();
    $veiculo= $veiculoDAO->getVeiculo($placa);

    session_start();
    if(!isset($_SESSION['carrinho'])){
        $carrinho= array();
    }else{
        $carrinho = $_SESSION['carrinho'];
    }
    $carrinho[]=$veiculo;
    $_SESSION['carrinho'] = $carrinho;

    header("Location:../views/exibirCarrinho.php");
}




?>