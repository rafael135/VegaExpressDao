<?php 
    namespace Entities;

use Entities\Databases\DatabaseMySql;
use Entities\Interfaces\DatabaseInterface;

    class ProdutoDao {
        private $tableName = "produtos";
        private DatabaseMySql $engine;

        public function __construct(DatabaseMySql $engine)
        {
            $this->engine = $engine;
        }

        public function getAllProdutos($order = null) {
            $produtos = $this->engine->select($this->tableName, ["*"], "");


            if($produtos != false) {
                $produtosRetorno = [];

                foreach($produtos as $produto) {
                    $newProduto = new Produto();
                    $newProduto->setId($produto["id"]);
                    $newProduto->setIdAutor($produto["idAutor"]);
                    $newProduto->setTitulo($produto["titulo"]);
                    $newProduto->setImagens($produto["imagens"]);
                    $newProduto->setPreco($produto["preco"]);
                    $newProduto->setDescricao($produto["descricao"]);
                    $newProduto->setDataCriacao($produto["dataCriacao"]);

                    array_push($produtosRetorno, $newProduto);
                }

                
                return $produtosRetorno;
            } else {
                return [];
            }
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
                $produto->setIdAutor($resultado[0]["idAutor"]);
                $produto->setTitulo($resultado[0]["titulo"]);
                $produto->setDescricao($resultado[0]["descricao"]);
                $produto->setImagens($resultado[0]["imagens"]);
                $produto->setDataCriacao($resultado[0]["dataCriacao"]);

                return $produto;
            }

            return false;
        }

        public function getProdutosByIdAutor($idAutor) {
            $productsData = $this->engine->select($this->tableName, ["*"], "idAutor = $idAutor");

            if($productsData != false) {
                $produtos = [];

                foreach($productsData as $product) {
                    $produto = new Produto();

                    $produto->setId($product["id"]);
                    $produto->setIdAutor($idAutor);
                    $produto->setTitulo($product["titulo"]);
                    $produto->setPreco($product["preco"]);
                    $produto->setDescricao($product["descricao"]);
                    $produto->setDataCriacao($product["dataCriacao"]);

                    array_push($produtos, $produto);
                }
                
                return $produtos;
                
            } else {
                return false;
            }
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
                "dataCriacao" => date("Y-m-d h:i:s", time())
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

        public function getProductsBySearch($searchTerm, $orderDate, $qteItems) {
            $where = "titulo LIKE '%$searchTerm%'";
            $order = [];

            if($orderDate != "ignore") {
                $order[0] = "dataCriacao";
                $order[1] = $orderDate;
            }

            $products = [];

            $ProductData = $this->engine->select($this->tableName, ["*"], $where, $order);

            if($ProductData != false) {
                foreach($ProductData as $product) {
                    $newProduct = new Produto();
                    $newProduct->setId($product["id"]);
                    $newProduct->setIdAutor($product["idAutor"]);
                    $newProduct->setTitulo($product["titulo"]);
                    $newProduct->setPreco($product["preco"]);
                    $newProduct->setDescricao($product["descricao"]);
                    $newProduct->setDataCriacao($product["dataCriacao"]);

                    array_push($products, $newProduct);
                }

                return $products;
            } else {
                return false;
            }
            
        }
    }
?>