<div class="container-fluid d-flex justify-content-center align-items-center container-usrPrincipal m-0 p-0">
    <div class="container-fluid container-usrProduct p-0 m-0">
        <div class="d-flex row m-0 p-0">
            <div class="col-lg-3 p-0 m-0 usrProducts-options py-2">
                <div class="d-flex flex-column">
                    <div class="d-flex row align-items-center justify-content-center m-0">
                        <div class="col-md-8 col-lg-8 p-0">
                            <div class="form-floating">
                                <input type="text" autocomplete="off" class="form-control rounded-0" id="searchInput"
                                    placeholder="Pesquisar" name="search" value="">
                                <label for="searchInput">Pesquisar</label>
                            </div>
                        </div>

                        <div class="btn-searchBar col-md-2 col-lg-2 p-0">
                            <button class="btn btn-primary rounded-0">
                                <i class="bi bi-search fs-4"></i>
                            </button>
                        </div>

                        <div class="col-lg-10 d-flex justify-content-center align-items-center p-0 m-0">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-addProduct rounded-0 w-100"
                                data-bs-toggle="modal" data-bs-target="#modalAddProduto">
                                <i class="bi bi-plus-circle fs-4"></i>
                            </button>
                        </div>
                    </div>
                    <div class="d-flex flex-grow-1 justify-content-center fw-semibold fs-5 align-items-end">
                        <div class="usrProduct-qte">Quantidade de produtos: <span class="badge bg-primary"
                                id="qte-products"><?=$produtos == false ? "0" : count($produtos);?></span></div>
                    </div>
                </div>
            </div>
            <div
                class="col-lg-9 cards-usrProducts d-flex flex-wrap justify-content-evenly align-content-start p-2 <?php if($produtos == false){ echo "justify-content-center align-items-center"; } ?>">
                <?php if($produtos != false): ?>
                <?php foreach($produtos as $produto): ?>
                <div class="col-lg-2 m-0 p-0">
                    <div class="card card-productUsr text-white bg-white rounded-0 mx-2 mb-2">
                        <img class="card-img-top" src="src/img/produto-exemplo.jpg" alt="Title">
                        <div class="card-body">
                            <h5 class="card-title text-truncate"><?=$produto->getTitulo();?></h5>
                                <p class="card-text fs-6">R$ <?=number_format($produto->getPreco(), 2, ",", ".");?></p>
                                <a class="card-usrProduct-link stretched-link" href="produto.php?id=<?=$produto->getId();?>"></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <h2 class="text-black fs-2">Você não possui nenhum produto</h2>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalAddProduto" tabindex="-1" aria-labelledby="modalAddProdutoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalAddProdutoLabel">Adicionar Produto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <input type="text" autocomplete="off" class="form-control" id="titulo" placeholder="Título"
                        name="titulo" value="">
                    <label for="titulo">Título</label>
                </div>
                <div class="form-floating mt-3">
                    <input type="text" autocomplete="off" class="form-control" id="preco" placeholder="Preço"
                        name="preco" value="">
                    <label for="preco">Preço</label>
                </div>

                <textarea class="form-control mt-3" name="descricao" placeholder="Descrição"
                    aria-multiline="true"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


<script src="src/js/usrProducts/usrProducts.js"></script>