<?php 
    namespace Entities;

    use Entities\Interfaces\DatabaseInterface;

    class ProdutoDao {
        private $tableName = "produtos";
        private DatabaseInterface $engine;

        public function __construct(DatabaseInterface $engine)
        {
            $this->engine = $engine;
        }

        public function addProduto(Produto $produto) {
            $idAutor = $produto->getIdAutor();
            $titulo = $produto->getTitulo();
            $preco = $produto->getPreco();
            $imagens = $produto->getImagens();
            $descricao = $produto->getDescricao();

            $resultado = $this->engine->insert($this->tableName, [
                "idAutor" => "$idAutor",
                "titulo" => "$titulo",
                "preco" => "$preco",
                "imagens" => "$imagens",
                "descricao" => $descricao,
                "dataCriacao" => "CURRENT_DATE"
            ]);

            return $resultado;
        }

        public function getProdutoById($id) {
            $resultado = $this->engine->select($this->tableName, ["*"], "id = $id");

            if($resultado != false) {
                $produto = new Produto();

                $produto->setId($id);
                $produto->setIdAutor($resultado["idAutor"]);
                $produto->setTitulo($resultado["titulo"]);
                $produto->setDescricao($resultado["descricao"]);
                $produto->setImagens($resultado["imagens"]);
                $produto->setDataCriacao($resultado["dataCriacao"]);

                return $produto;
            }

            return false;
        }

        public function updateProduto(Produto $produto) {
            $id = $produto->getId();
            $titulo = $produto->getTitulo();
            $preco = $produto->getPreco();
            $descricao = $produto->getDescricao();
            $imagens = $produto->getImagens();
            
            $resultado = $this->engine->update($this->tableName, [
                "titulo" => "$titulo",
                "preco" => "$preco",
                "descricao" => "$descricao",
                "imagens" => "$imagens",
                "dataCriacao" => "CURRENT_DATE"
            ], "id = $id");

            return $resultado;
        }

        public function deleteProdutoById($id, $idEnviado) {
            // Pego o id do autor do produto informado
            $verificacao = $this->engine->select($this->tableName, ["idAutor"], "id = $id");

            // Verifico se o produto existe, caso falso, retorna falso
            if($verificacao == false) {
                return false;
            }

            // Pego o id do autor do produto informado
            $idAutor = $verificacao["idAutor"];

            // Verifico se o id do usuario que solicitou a remoção do produto é o mesmo do autor, caso diferente, retorno falso
            if($idEnviado != $idAutor) {
                return false;
            }

            // Deleto o produto e armazeno se foi excluido com sucesso
            $resultado = $this->engine->delete($this->tableName, "id = $id");

            return $resultado;
        }
    }
?>