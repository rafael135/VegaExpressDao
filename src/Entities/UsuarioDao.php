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

        public function addUsr(Usuario $usr) 
        {
            $nome = $usr->getNome();
            $email = $usr->getEmail();
            $senha = $usr->getSenha();


            if(!empty($nome) && !empty($email) && !empty($senha)) {
                $hash = password_hash($senha, PASSWORD_DEFAULT);
                $token = md5(time() . rand(0, 9999) . time());

                $resultado = $this->engine->insert($this->tableName, [
                    "nome" => $nome,
                    "email" => $email,
                    "senha" => $hash,
                    "token" => $token
                ]);

                if($resultado == true) {
                    return $token;
                } else {
                    return false;
                }
            }

            return false;
        }

        public function getUsrByToken($token) {
            $usr = new Usuario();

            $dados = $this->engine->select($this->tableName, ["*"], "token = '$token'");

            if($dados != false) {
                $usr->setId($dados[0]["id"]);
                $usr->setNome($dados[0]["nome"]);
                $usr->setEmail($dados[0]["email"]);
                $usr->setCpf($dados[0]["cpf"]);
                $usr->setEndereco($dados[0]["endereco"]);

                return $usr;
            } else {
                return false;
            }
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
                "endereco" => "$endereco"
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

        public function login($email, $senha) {
            $usrData = $this->engine->select($this->tableName, ["*"], "email = '$email'");
            $token = md5(time() . rand(0, 9999) . time());

            if(password_verify($senha, $usrData[0]["senha"])) {
                $alt = $this->engine->update($this->tableName, [
                    "token" => $token
                ], "id = " . $usrData[0]["id"]);

                if($alt == true) {
                    return $token;
                } else {
                    return false;
                }
                
            } else {
                return false;
            }
        }
    }
?>