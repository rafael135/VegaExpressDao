<div class="container-fluid p-0 mt-4 mb-4 px-4">
    <div class="search-bar">
        <form class="p-0 m-0">
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
                        <i class="bi bi-arrow-bar-down fs-3"></i>
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
                                <input type="radio" class="btn-check" value="new" name="radioOrderDate" id="radioOrderDate1"
                                    autocomplete="off">
                                <label class="btn btn-primary" for="radioOrderDate1">Mais atual</label>
                                <input type="radio" class="btn-check" value="ignore" name="radioOrderDate" id="radioOrderDate2"
                                    autocomplete="off" checked>
                                <label class="btn btn-primary" for="radioOrderDate2">Ignorar</label>
                                <input type="radio" class="btn-check" value="old" name="radioOrderDate" id="radioOrderDate3"
                                    autocomplete="off">
                                <label class="btn btn-primary" for="radioOrderDate3">Mais antiga</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>