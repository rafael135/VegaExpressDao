<?php 
    namespace Entities;

    use Entities\Databases\DatabaseMySql;
    use Entities\Interfaces\DatabaseInterface;
    use PDOException;

    class UsuarioDao {
        private $tableName = "usuarios";
        private DatabaseMySql $engine;

        public function __construct(DatabaseMySql $engine)
        {
            $this->engine = $engine;
        }

        public function getUsrById($id) 
        {
            $usr = new Usuario();

            $dados = $this->engine->select($this->tableName, ["*"], "id = $id");

            if($dados != false) 
            {
                $usr->setId($dados["id"]);
                $usr->setNome($dados["nome"]);
                $usr->setEmail($dados["email"]);
                $usr->setEndereco($dados["endereco"]);
                //$usr->setSenha($dados["senha"]);

                return $usr;
            } else 
            {
                return false;
            }
        }

        public function getAllUsr() 
        {   
            

            $dados = $this->engine->select($this->tableName, ["*"], "");

            if($dados != false) {
                $usuarios = [];

                for($i = 0; $i < count($dados); $i++) {
                    $usuario = new Usuario();
                    $usuario->setId($dados[$i]["id"]);
                    $usuario->setNome($dados[$i]["nome"]);
                    $usuario->setEmail($dados[$i]["email"]);
                    $usuario->setEndereco($dados[$i]["endereco"]);
                    $usuario->setSenha($dados[$i]["senha"]);

                    array_push($usuarios, $usuario);
                }

                return $usuarios;
                
            }

            return false;
        }

        public function updateUsr(Usuario $usuario) 
        {
            $id = $usuario->getId();
            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $endereco = $usuario->getEndereco();

            $resultado = $this->engine->update($this->tableName, 
            [
                "nome" => "$nome",
                "email" => "$email",
                "senha" => "$senha",
                "endereco" => "$endereco",

            ],
            "id = $id");

            return $resultado;
        }

        public function deleteById($id) 
        {
            return $this->engine->delete($this->tableName, "$this->tableName.id = $id");
        }

        public function emailCadastrado(string $email) 
        {
            $resultado = $this->engine->select($this->tableName, ["*"], "email = '$email'");

            if($resultado == false) 
            {
                return false;
            } else 
            {
                return true;
            }
        }
    }
?>