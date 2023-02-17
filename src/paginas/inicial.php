<?php
    use Entities\ProdutoDao;

    $produtoDao = new ProdutoDao($engine);

    $listProdutos = $produtoDao->getAllProdutos();

    /* src img produto: public_assets/<?=$produto->getIdAutor();?>/produtos/<?=$produto->getId();?>/<?=$produto->getImagens()[0];?> */
?>

<div class="container-fluid container-inicial mt-3 mx-4">
    <div class="title-inicial">Últimos Adicionados</div>
    <div class="d-flex flex-wrap flex-row justify-content-evenly m-0 m-3 p-0">
    <?php foreach($listProdutos as $produto): ?>
        <div class="card-products">
            <a href="produto.php?id=<?=$produto->getId();?>">
                <img src="https://via.placeholder.com/300x200" alt="Produto 1">
                <h2><?=$produto->getTitulo();?></h2>
                <span>R$ <?=$produto->getPreco();?></span>
            </a>
        </div>
    <?php endforeach; ?>
    </div>
</div>