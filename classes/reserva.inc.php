<?php
require_once "locacao.inc.php";

class Reserva 
{
    private Locacao $locacao;
    private $totalReserva;



    function __construct($locacao)
    {
        $this->locacao = $locacao;
        $this->totalReserva = $this->locacao->__get('valor_total');


    }



}



?>