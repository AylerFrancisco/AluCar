<?php
require_once "conexao.inc.php";

require_once 'conexao.inc.php';
class ClienteDao
{

    private $con;
    function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function autenticar($email, $senha)
    {

        $sql = $this->con->prepare("select * from usuarios where email = :email and senha = :pass");

        $email = strtoupper($email);
        $senha = strtolower($senha);
        $sql->bindValue(':email', $email);
        $sql->bindValue(':pass', $senha);
        $sql->execute();
        $count = $sql->rowCount();
        $cliente = null;
        if ($count == 1) {
            $cliente = $sql->fetch(PDO::FETCH_OBJ);
        }
        return $cliente;
    }
}

   
