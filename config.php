<?php
    require("vendor/autoload.php");

    session_start();
    use Entities\Databases\DatabaseMySql;
    use Entities\UsuarioDao;

    $engine = new DatabaseMySql();
    $usrDao = new UsuarioDao($engine);

    $loggedUser = false;

    if(isset($_SESSION["token"])) {
        $loggedUser = $usrDao->getUsrByToken($_SESSION["token"]);
    }

    
    
?>