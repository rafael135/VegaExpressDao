<?php
    namespace Entities\Databases;

    use Entities\Interfaces\DatabaseInterface;
    use PDO;
    use PDOException;

    class DatabaseMySql implements DatabaseInterface 
    {
        private $host = "localhost";
        private $usuario = "root";
        private $senha = "";
        private $databaseName = "vegaExpress";

        private PDO $pdo;

        public function __construct()
        {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->databaseName", $this->usuario, $this->senha);
        }

        private function checkWhere($where) 
        {
            return strlen($where) ? " WHERE $where" : "";
        }


        public function select($table, array $fields, $where)
        {
            $where = $this->checkWhere($where);

            $queryStr = "SELECT " . implode(",", $fields) . " FROM $table" . $where;
            
            $sql = $this->pdo->prepare($queryStr);

            if($sql != false) {
                $result = false;

                try 
                {
                    $result = $sql->execute();
                } catch(PDOException $e) 
                {
                    return false;
                }

                if($result == true) {
                    if($sql->rowCount() > 0) 
                    {
                        return $sql->fetchAll(PDO::FETCH_ASSOC);
                    } 
                    else 
                    {
                        return false;
                    }
                }
            }
            
            return false;
        }

        public function insert($table ,$fields, $where)
        {
            $where = $this->checkWhere($where);
        }

        public function update($table, $fields, $where)
        {
            $where = $this->checkWhere($where);

            if($where == "") {
                return false;
            }

            $values = array_values($fields);
            $keys = array_keys($fields);


            $queryStr = "UPDATE $table SET ";

            for($i = 0; $i < count($keys); $i++) {
                $queryStr .= "$keys[$i] = '$values[$i]'";

                if($i + 1 <= count($keys)) {
                    $queryStr .= ", ";
                }
            }

            $queryStr .= $where;

            $result = false;
            $sql = $this->pdo->prepare($queryStr);

            try 
            {
                $result = $sql->execute();
            }
            catch(PDOException $e) 
            {
                return false;
            }

            return $result;
        }

        public function delete($table, $where)
        {
            $where = $this->checkWhere($where);

            if($where == "") {
                return false;
            }

            $queryStr = "DELETE FROM $table" . $where;

            $sql = $this->pdo->prepare($queryStr);
            $resultado = false;
            
            try 
            {
                $resultado = $sql->execute();
            } catch(PDOException $e) 
            {
                return false;
            }

            return $resultado;
        }
    }
?>