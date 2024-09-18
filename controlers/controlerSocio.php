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

if($opcao == 3){
    $cpf = (int)$_REQUEST['cpf'];

    $socioDao = new SocioDao();
    $socioDao->excluirSocio($cpf);

    header("Location:controlerSocio.php?opcao=2");
}

if($opcao == 4){
    session_start();
    $cpf = (int)$_REQUEST['cpf'];

    $socioDao= new SocioDao();

    $socio = $socioDao->getSocio($cpf);
    

    
    $_SESSION['socio'] = $socio;

    header("Location:../views/formSocioAtualizar.php");
}
if ($opcao == 5){
    $socio= new Socio();
    $socio->setSocio($_POST['pCpf'], $_POST['pNome'], $_POST['pRg'], $_POST['pEndereco'], $_POST['pTelefone'], $_POST['pEmail']);


    $socioDao= new SocioDao();
    $socioDao->atualizarSocio($socio);


    header("Location:controlerSocio.php?opcao=2");


}



?>