<?php
    namespace Entities\Interfaces;

    interface DatabaseInterface {
        public function getEngine();
        public function select($table, array $fields, $where, $order = null, $limit = null);
        public function insert($table, array $fields);
        public function update($table, array $fields, $where);
        public function delete($table, $where);
    }
?>