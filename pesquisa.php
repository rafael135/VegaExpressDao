<?php

use Entities\ProdutoDao;

    require "vendor/autoload.php";
    require "config.php";

    $searchTerm = filter_input(INPUT_GET, "search");
    $orderDate = filter_input(INPUT_GET, "orderDate");
    $qteItems = filter_input(INPUT_GET, "qteItems");
    $pagina = filter_input(INPUT_GET, "pagina");

    $searchTerm = ($searchTerm == null || $searchTerm == "") ? false : $searchTerm;
    $orderDate = ($orderDate == null) ? false : $orderDate;
    $qteItems = ($qteItems == null) ? false : $qteItems;
    $pagina = ($pagina == null) ? 0 : $pagina;

    if($searchTerm == false) {
        header("Location: index.php");
        exit;
    }

    $produtosDao = new ProdutoDao($engine);
    $products = $produtosDao->getProductsBySearch($searchTerm, $orderDate, $qteItems);
    

    require "src/paginas/default/header.php";    
?>

<body>
    <?php require "src/paginas/default/navbar.php"; ?>

    <?php require "src/paginas/default/searchBar.php"; ?>



    <div class="container-fluid container-searchProduct mx-5 p-0">
        <div class="d-flex flex-row">
            <div class="col-lg-12 d-flex flex-column">
                <?php if($products != false): ?>
                <?php foreach($products as $product): ?>

                <div class="card card-searchPage mb-3">
                    <div class="d-flex row g-0">
                        <div class="searchCard-img">
                            <img src="https://via.placeholder.com/300x200" class="img-fluid rounded-0" alt="">
                        </div>
                        <div class="flex-grow-1">
                            <div class="card-body p-0 d-flex flex-column justify-content-between h-100">
                                <h2 title="" class="card-title text-truncate"><?=$product->getTitulo();?></h2>
                                <span class="products-price ms-auto">R$ <?=number_format($product->getPreco(), 2, ",", ".");?></span>
                            </div>
                        </div>
                        <a class="stretched-link" href=""></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>


            <?php endif; ?>

            <!--
            <div class="col-lg-3 d-flex flex-column">

            </div>
            -->
        </div>
    </div>



    <?php require "src/paginas/default/footer.php"; ?>