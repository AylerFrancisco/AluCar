<?php
    require_once "conexao.inc.php";
    require_once "../classes/socio.inc.php";


    class SocioDao{
        private $con;

        function __construct()
        {
            $c = new Conexao();
            $this->con=$c->getConexao();
        }

        public function incluirSocio(Socio $socio){
            $sql = $this->con->prepare("insert into socios(cpf,nome,rg,endereco,telefone,email) values(:cpf,:nome,:rg,:endereco,:telefone,:email)");

            $sql->bindValue(':cpf',$socio->cpf);
            $sql->bindValue(':nome',$socio->nome);
            $sql->bindValue(':rg', $socio->rg);
            $sql->bindValue(':endereco', $socio->endereco);
            $sql->bindValue(':telefone', $socio->telefone);
            $sql->bindValue(':email', $socio->email);
            $sql->execute();
            
            
        }


        public function getSocios(){
            $rs = $this->con->query("select * from socios");

            $lista = array();
            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                $socio = new Socio();
                $socio->__set($socio->cpf, $row->cpf);
                $socio->__set($socio->nome, $row->nome);
                $socio->__set($socio->rg, $row->rg);
                $socio->__set($socio->endereco, $row->endereco);
                $socio->__set($socio->telefone, $row->telefone);
                $socio->__set($socio->email, $row->email);

                $lista[] = $socio;

            }
            return $lista;
        }
    }



?>