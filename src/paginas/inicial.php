<?php
    use Entities\ProdutoDao;

    $produtoDao = new ProdutoDao($engine);

    $listProdutos = $produtoDao->getAllProdutos();
?>

<div class="container-fluid container-inicial mt-3 mx-4">
    <div class="title-inicial">Últimos Adicionados</div>
    <div class="d-flex flex-wrap flex-row justify-content-evenly m-0 m-3 p-0">
    <?php foreach($listProdutos as $produto): ?>
        <a href="produto.php?id=<?=$produto->getId();?>">
            <div class="card card-product">
                <img class="card-img-top img-fluid" src="public_assets/<?=$produto->getIdAutor();?>/produtos/<?=$produto->getId();?>/<?=$produto->getImagens()[0];?>" alt="">
                <div class="card-body p-1 border-top">
                    <div class="product-price">R$ <?=str_replace(".", ",", $produto->getPreco());?></div>
                    <div class="product-title"><?=$produto->getTitulo();?></div>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
    </div>
</div>