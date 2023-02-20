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
        <div class="card-products mx-2">
                <img src="https://via.placeholder.com/300x200" alt="Imagem">
                <h2 title="<?=$produto->getTitulo();?>" class="text-truncate"><?=$produto->getTitulo();?></h2>
                <span class="products-price">R$ <?= number_format($produto->getPreco(), 2, ',', '.');?></span>
                <a class="stretched-link" href="produto.php?id=<?=$produto->getId();?>" title="<?=$produto->getTitulo();?>"></a>
        </div>
    <?php endforeach; ?>
    </div>
</div>