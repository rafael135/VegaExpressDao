<div class="container-fluid p-0 mt-4 mb-4 px-4">
    <div class="search-bar">
        <form class="p-0 m-0" method="get" action="pesquisa.php">
            <div class="d-flex row align-items-center m-0">
                <div class="col-md-8 col-lg-10 p-0">
                    <div class="form-floating">
                        <input type="text" autocomplete="off" class="form-control" id="searchInput" placeholder="Pesquisar"
                            name="search" value="">
                        <label for="searchInput">Pesquisar</label>
                    </div>
                </div>

                <div class="btn-searchBar col-md-2 col-lg-1 p-0">
                    <button class="btn btn-primary">
                        <i class="bi bi-search fs-3"></i>
                    </button>
                </div>

                <div class="btn-searchBar col-md-2 col-lg-1 p-0">
                    <button class="btn btn-primary" type="button" id="btn-collapse" data-bs-toggle="collapse" data-bs-target="#filtersCollapse"
                        aria-expanded="false" aria-controls="filtersCollapse">
                        <i class="bi bi-chevron-compact-down fs-4"></i>
                    </button>
                </div>
            </div>
            <div class="collapse" id="filtersCollapse">
                <div class="m-0">
                    <div class="d-flex row m-0">
                        <div class="col-lg-4 searchBar-inputBorders p-3 d-flex flex-column" id="collapseInput-orderDate">
                            <div class="searchBar-input-label d-inline-flex mx-2">Filtrar por data:</div>
                            <div class="btn-group d-inline-flex mx-2" role="group"
                                aria-label="Vertical radio toggle button group">
                                <input type="radio" class="btn-check" value="DESC" name="OrderDate" id="radioOrderDate1"
                                    autocomplete="off">
                                <label class="btn btn-primary" for="radioOrderDate1">Mais atual</label>
                                <input type="radio" class="btn-check" value="ignore" name="OrderDate" id="radioOrderDate2"
                                    autocomplete="off" checked>
                                <label class="btn btn-primary" for="radioOrderDate2">Ignorar</label>
                                <input type="radio" class="btn-check" value="ASC" name="OrderDate" id="radioOrderDate3"
                                    autocomplete="off">
                                <label class="btn btn-primary" for="radioOrderDate3">Mais antiga</label>
                            </div>
                        </div>
                        <div class="col-lg-4 p-3 d-flex flex-column">
                            <label class="form-label" for="qteItems">Quantidade de produtos por página:</label>
                            <select class="form-select" id="qteItems" name="qteItems">
                                <option selected value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="src/js/searchBar/searchBar.js"></script>