<div class="container-fluid container-usrProduct mt-3 mx-auto">
    <div class="d-flex row m-0 p-0">
        <div class="col-lg-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddProduto">
                Adicionar produto
            </button>
        </div>
        <div class="col-lg-2 m-0 p-0">
            <div class="card text-white bg-white">
                <img class="card-img-top" src="" alt="Title">
                <div class="card-body">
                    <h4 class="card-title">Title</h4>
                    <p class="card-text">Text</p>
                </div>
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

                <textarea class="form-control mt-3" name="descricao" placeholder="Descrição" aria-multiline="true"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>