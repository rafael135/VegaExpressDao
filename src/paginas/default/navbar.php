<nav class="navbar navbar-expand-lg">
    <div class="container-fluid justify-content-center justify-content-md-end">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="">VegaExpress</a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="" id="btn-user-sideBar" class="nav-link">
                        <i id="btn-user-icon" class="bi bi-person-circle"></i>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</nav>

<aside id="asideUser-menu">
    <div id="sideBar-menu" class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <strong>mdo</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu text-small shadow" aria-labelledby="dropdownUser1">
                <li><a class="dropdown-item" href="#">Configurações</a></li>
                <li><a class="dropdown-item" href="#">Perfil</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="#">Sair</a></li>
            </ul>
        </div>
        <hr/>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="#" class="nav-link active" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Página inicial
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#table"></use>
                    </svg>
                    Pedidos
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#grid"></use>
                    </svg>
                    Produtos
                </a>
            </li>
        </ul>
    </div>
</aside>

<script type="text/javascript">
let sideBar = document.getElementById("asideUser-menu");
let btnUserSideBar = document.getElementById("btn-user-sideBar");

btnUserSideBar.addEventListener("click", (e) => {
    e.preventDefault();
    sideBar.classList.add("show");
});

document.addEventListener("click", (e) => {
    if (e.target.id != sideBar.id && e.target.id != btnUserSideBar.id && e.target.id != "btn-user-icon" && e
        .target.id != "dropdownUser1") {
        sideBar.classList.remove("show");
    }
});
</script>