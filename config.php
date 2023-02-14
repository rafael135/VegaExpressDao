<?php

    use Entities\Databases\DatabaseMySql;

    require("vendor/autoload.php");

    $engine = new DatabaseMySql();
    session_start();
?>