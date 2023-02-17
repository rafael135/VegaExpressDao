<div class="container-fluid container-usrProduct mt-3 px-0 mx-auto">
    <div class="d-flex row m-0 p-0">
        <div class="col-lg-4 p-0 m-0 usrProducts-options py-2">
            <div class="d-flex row align-items-center justify-content-center m-0">
                <div class="col-md-8 col-lg-8 p-0">
                    <div class="form-floating">
                        <input type="text" autocomplete="off" class="form-control rounded-0" id="searchInput"
                            placeholder="Pesquisar" name="search" value="">
                        <label for="searchInput">Pesquisar</label>
                    </div>
                </div>

                <div class="btn-searchBar col-md-2 col-lg-2 p-0 h-100">
                    <button class="btn btn-primary rounded-0">
                        <i class="bi bi-search fs-4"></i>
                    </button>
                </div>

                <div class="col-lg-10 d-flex justify-content-center align-items-center p-0 m-0">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-addProduct rounded-0 w-100" data-bs-toggle="modal" data-bs-target="#modalAddProduto">
                        <i class="bi bi-plus-circle fs-4"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-8 cards-usrProducts p-2">
            <div class="col-lg-2 m-0 p-0">
                <a class="card-usrProduct-link" href="produto.php?id=">
                    <div class="card card-productUsr text-white bg-white rounded-0">
                        <img class="card-img-top" src="src/img/produto-exemplo.jpg" alt="Title">
                        <div class="card-body">
                            <h5 class="card-title">Title dasdasd</h4>
                            <p class="card-text fs-6">R$ 50,00</p>
                        </div>
                    </div>
                </a>
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