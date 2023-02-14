<form class="form-login p-0" id="form-registro" method="POST" action="src/actions/addUsr_action.php">
    <div class="container-fluid form-legend rounded-top p-2 fs-4 text-center">Login</div>
    <div class="container-fluid p-0 m-0 d-flex flex-column justify-content-center h-auto px-3 my-2">

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId"
                placeholder="exemplo@email.com">
            <small id="emailHelpId" class="form-text text-muted d-none">Help text</small>
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="senha" min="8" id="senha" autocomplete="current-password"
                placeholder="Min de 8 caracteres">
        </div>

        <button type="submit" class="btn btn-dark">Registrar</button>
    </div>
</form>