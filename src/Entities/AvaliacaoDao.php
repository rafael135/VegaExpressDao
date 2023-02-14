<?php
    namespace Entities;

    use Entities\Databases\DatabaseMySql;
    use Entities\Interfaces\DatabaseInterface;

    class AvaliacaoDao {
        private DatabaseMySql $engine;
        private $tableName = "avaliacoes";

        public function __construct(DatabaseMySql $engine)
        {
            $this->engine = $engine;
        }

        public function getAvaliacoesProdutoById($idProduto) { // return Avaliacao[] || false
            
        }

        public function getUsuarioAvaliacao($id) { // return Usuario || false

        }

        public function deleteAvaliacao($idUsuario, $idAvaliacao) { // return true || false

        }
    }
?>