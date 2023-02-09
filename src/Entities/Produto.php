<?php 
    namespace Entities;

use DateTime;

    class Produto {
        private $id;
        private $idAutor;
        private $titulo;
        private $preco;
        private $imagens;
        private $descricao;
        private DateTime $dataCriacao;

        public function __construct()
        {
            
        }

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getIdAutor() {
            return $this->idAutor;
        }

        public function setIdAutor($id) {
            $this->idAutor = $id;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getPreco() {
            return $this->preco;
        }

        public function setPreco($preco) {
            $this->preco = $preco;
        }

        public function getImagens() {
            return $this->imagens;
        }

        public function setImagens($imagens) {
            $this->imagens = $imagens;
        }

        public function getDescricao() {
            return $this->descricao;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }

        public function getDataCriacao() {
            return $this->dataCriacao;
        }

        public function setDataCriacao($data) {
            $this->dataCriacao = new DateTime($data);
        }
    }
?>