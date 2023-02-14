<?php
    use Entities\ProdutoDao;

    $produtoDao = new ProdutoDao($engine);

    $listProdutos = $produtoDao->getAllProdutos();
?>

<div class="container-fluid mt-3 d-flex flex-wrap flex-row justify-content-evenly">
    <?php foreach($listProdutos as $produto): ?>
        <div class="card card-produto">
            <img class="card-img-top img-fluid" src="public_assets/<?=$produto->getIdAutor();?>/produtos/<?=$produto->getId();?>/<?=$produto->getImagens()[0];?>" alt="">
            <div class="card-body p-1">
                <h4 class="card-title text-center"><?=$produto->getTitulo();?> <span class="badge bg-secondary">R$<?=$produto->getPreco();?></span></h4>
            </div>
        </div>
    <?php endforeach; ?>
</div>