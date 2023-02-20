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



        public function getEngine() {
            return $this->pdo;
        }

        private static function checkWhere($where) 
        {
            return strlen($where) ? " WHERE $where" : "";
        }

        private static function checkOrder($order) {
            return (is_array($order) && $order != null) ? " ORDER BY " . $order[0] . " $order[1]" : "";
        }

        public function select($table, array $fields, $where, $order = null, $limit = null)
        {
            $where = self::checkWhere($where);
            $order = self::checkOrder($order);

            $queryStr = "SELECT " . implode(",", $fields) . " FROM $table" . $where;
            
            $queryStr .= $order;

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

        public function insert($table ,$fields)
        {
            $values = array_values($fields);
            $keys = array_keys($fields);
            
            
            $queryStr = "INSERT INTO $table (" . implode(", ", $keys) . ") VALUES (";

            for($i = 0; $i < count($values); $i++) {
                $queryStr .= "'$values[$i]'";

                if($i + 1 < count($values)) {
                    $queryStr .= ", ";
                }
            }
            $queryStr .= ")";

            $sql = $this->pdo->prepare($queryStr);

            $resultado = false;

            try {
                $resultado = $sql->execute();
            } catch(PDOException $e) {
                return false;
            }

            return $resultado;
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

                if($i + 1 < count($keys)) {
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