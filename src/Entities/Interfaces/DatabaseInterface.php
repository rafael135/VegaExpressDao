<?php
    namespace Entities\Interfaces;

    interface DatabaseInterface {
        public function select($table, array $fields, $where);
        public function insert($table, array $fields, $where);
        public function update($table, array $fields, $where);
        public function delete($table, $where);
    }
?>