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
            $sql = $this->con->prepare("insert into socios(cpf,nome,rg,endereco,telefone,email,senha) values(:cpf,:nome,:rg,:endereco,:telefone,:email,:senha)");

            $sql->bindValue(':cpf',$socio->cpf);
            $sql->bindValue(':nome',$socio->nome);
            $sql->bindValue(':rg', $socio->rg);
            $sql->bindValue(':endereco', $socio->endereco);
            $sql->bindValue(':telefone', $socio->telefone);
            $sql->bindValue(':email', $socio->email);
            $sql->bindValue(':senha', $socio->senha);
            $sql->execute();
            
            
        }


        public function getSocios(){
            $rs = $this->con->query("select * from socios");

            $lista = array();
            while($row = $rs->fetch(PDO::FETCH_OBJ)){
                $socio = new Socio();
                $socio->__set('cpf', $row->cpf);
                $socio->__set('nome', $row->nome);
                $socio->__set('rg', $row->rg);
                $socio->__set('endereco', $row->endereco);
                $socio->__set('telefone', $row->telefone);
                $socio->__set('email', $row->email);

                $lista[] = $socio;

            }
            return $lista;
        }



        public function excluirSocio($cpf){

            $sql=$this->con->prepare("delete from socios where cpf = :cpf");
            $sql->bindValue(':cpf',$cpf);
            $sql->execute();

        }


        public function getSocio($cpf){
            $sql= $this->con->prepare("SELECT * FROM socios WHERE cpf = :cpf");
            $sql->bindValue(':cpf', $cpf);
            $sql->execute();

            $row = $sql->fetch(PDO::FETCH_OBJ);
            
            $socio = new Socio;
            $socio->setSocio($row->cpf, $row->nome, $row->rg, $row->endereco, $row->telefone, $row->email,$row->senha);

            

            return $socio;
        }



        public function atualizarSocio(Socio $socio){
            $sql= $this->con->prepare("update socios set cpf = :cpf , nome= :nome , rg = :rg , endereco= :endereco,telefone= :telefone, email= :email,senha = :senha where cpf = :cpf2");

            
            $sql->bindValue(':cpf', $socio->cpf);
            $sql->bindValue(':nome', $socio->nome);
            $sql->bindValue(':rg', $socio->rg);
            $sql->bindValue(':endereco', $socio->endereco);
            $sql->bindValue(':telefone', $socio->telefone);
            $sql->bindValue(':email', $socio->email);
            $sql->bindValue(':senha', $socio->senha);
            $sql->bindValue(':cpf2', $socio->cpf);
            $sql->execute();

        }
    }



?>