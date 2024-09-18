<?php
require_once '../dao/socioDao.inc.php';

$opcao = (int)$_REQUEST['opcao'];

if ($opcao == 1) //  inclusão
{
    $socio = new Socio();
    $socio->setSocio($_REQUEST['pCpf'], $_REQUEST['pNome'], $_REQUEST['pRg'], $_REQUEST['pEndereco'], $_REQUEST['pTelefone'], $_REQUEST['pEmail']);

    $socioDao = new SocioDao();
    $socioDao->incluirSocio($socio);

    header("Location:controlerSocio.php?opcao=2");

}

if ($opcao == 2)
{
    $socioDao= new SocioDao();
    $lista = $socioDao->getSocios();

    session_start();
    $_SESSION['socios'] = $lista;

    header("Location:../views/exibirSocios.php");
}




?>