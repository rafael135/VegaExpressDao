<?php

use Entities\ProdutoDao;

    require "vendor/autoload.php";
    require "config.php";

    if($loggedUser == false) {
        header("Location: login.php");
        exit;
    }

    $ProductDao = new ProdutoDao($engine);
    $produtos = $ProductDao->getProdutosByIdAutor($loggedUser->getId());

    require "src/paginas/default/header.php";
?>
    <body>
<?php
    require "src/paginas/default/navbar.php";
?>

<?php require "src/paginas/productPages/usrProduct.php"; ?>

<?php 
    require "src/paginas/default/footer.php";
?>