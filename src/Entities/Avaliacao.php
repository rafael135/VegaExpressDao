<?php
    namespace Entities;

    use DateTime;

    class Avaliacao {
        private $id;
        private $idUsuario;
        private $titulo;
        private $corpo;
        private $likes;
        private $deslikes;
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

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function setIdUsuario($id) {
            $this->idUsuario = $id;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getCorpo() {
            return $this->corpo;
        }

        public function setCorpo($corpo) {
            $this->corpo = $corpo;
        }

        public function getLikes() {
            return $this->likes;
        }

        public function setLikes($likes) {
            $this->likes = $likes;
        }

        public function getDeslikes() {
            return $this->deslikes;
        }

        public function setDeslikes($deslikes) {
            $this->deslikes = $deslikes;
        }

        public function getDataCriacao() {
            return $this->dataCriacao;
        }

        public function setDataCriacao($data) {
            $this->dataCriacao = new DateTime($data);
        }
    }
?>  