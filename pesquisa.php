<?php

use Entities\ProdutoDao;

require "vendor/autoload.php";
require "config.php";

$searchTerm = filter_input(INPUT_GET, "search");
$orderDate = filter_input(INPUT_GET, "OrderDate");
$qteItems = filter_input(INPUT_GET, "qteItems");
$pagina = filter_input(INPUT_GET, "pagina");

$searchTerm = ($searchTerm == null || $searchTerm == "") ? false : $searchTerm;
$orderDate = ($orderDate == null) ? false : $orderDate;
$qteItems = ($qteItems == null) ? false : $qteItems;
$pagina = ($pagina == null) ? 0 : $pagina;

$limit = [];

if ($pagina == 0) {
    $limit = [0, $qteItems];
} else {
    $limit = [$pagina * $qteItems, $qteItems];
}

if ($searchTerm == false) {
    header("Location: index.php");
    exit;
}

$produtosDao = new ProdutoDao($engine);
$products = $produtosDao->getProductsBySearch($searchTerm, $orderDate, $limit);


require "src/paginas/default/header.php";
?>

<body>
    <?php require "src/paginas/default/navbar.php"; ?>

    <?php require "src/paginas/default/searchBar.php"; ?>



    <div class="container container-searchProduct d-flex flex-column justify-content-center align-items-center bg-body-tertiary mx-auto p-0">
        <div class="d-flex flex-column">
            <div class="col-lg-12 d-flex flex-column">
                <?php if ($products != false) : ?>
                    <?php foreach ($products as $product) : ?>

                        <div class="card card-searchPage m-4">
                            <div class="d-flex row g-0">
                                <div class="searchCard-img">
                                    <img src="https://via.placeholder.com/300x200" class="img-fluid rounded-0" alt="">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="card-body p-0 d-flex flex-column justify-content-between h-100">
                                        <h2 title="" class="card-title text-truncate"><?= $product->getTitulo(); ?></h2>
                                        <span class="products-price ms-auto">R$ <?= number_format($product->getPreco(), 2, ",", "."); ?></span>
                                    </div>
                                </div>
                                <a class="stretched-link" href="produto.php?id=<?= $product->getId(); ?>"></a>
                            </div>
                        </div>
                    <?php endforeach; ?>
            </div>
        <?php else : ?>


        <?php endif; ?>

        <!--
            <div class="col-lg-3 d-flex flex-column">

            </div>
            -->
        </div>

        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item <?=($pagina == 0) ? "disabled" : ""?>">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>



    <?php require "src/paginas/default/footer.php"; ?>