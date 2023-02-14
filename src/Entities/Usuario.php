<?php 
    namespace Entities;

    class Usuario {
        private int $id;
        private string $nome;
        private string $email;
        private string $endereco;
        private string $senha;
        private string $cpf;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getEndereco() {
            return $this->endereco;
        } 

        public function setEndereco($endereco) {
            $this->endereco = $endereco;
        }

        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = $senha;
        }

        public function getCpf() {
            return $this->cpf;
        }

        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }
    }
?>