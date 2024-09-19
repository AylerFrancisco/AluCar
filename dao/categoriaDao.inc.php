<?php
require_once "conexao.inc.php";
require_once "../utils/funcoesUteis.php";

class CategoriaDAO
{
    private $con;

    function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function getCategorias()
    {
        $rs = $this->con->query("select * from categoria");
        $lista = array();

        while ($row = $rs->fetch(PDO::FETCH_OBJ)) {
            // $fabricante = new stdClass(); // https://www.php.net/manual/pt_BR/class.stdclass.php
            // $fabricante->codigo = $row->codigo;
            // $fabricante->nome = $row->nome;

            $lista[] = $row;
        }

        return $lista;
    }
}
