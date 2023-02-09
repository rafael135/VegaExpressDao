<?php
    require "../../vendor/autoload.php";

    use Entities\Databases\DatabaseMySql;
    use Entities\Usuario;
    use Entities\UsuarioDao;

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $cep = filter_input(INPUT_POST, "cep");
    $bairro = filter_input(INPUT_POST, "bairro");
    $numero = filter_input(INPUT_POST, "numero", FILTER_VALIDATE_INT);
    $endereco = "$cep;$bairro;$numero";
    $endereco = filter_var($endereco, FILTER_SANITIZE_SPECIAL_CHARS);

    $senha = filter_input(INPUT_POST, "senha", FILTER_SANITIZE_SPECIAL_CHARS);


    $verificao = $nome && $email && $cep && $bairro && $numero && $endereco && $senha;
    if($verificao == true) {
        $senha = password_hash($senha, PASSWORD_DEFAULT);

        $usr = new Usuario();
        $usr->setNome($nome);
        $usr->setEmail($email);
        $usr->setEndereco($endereco);
        $usr->setSenha($senha);

        $dbMySql = new DatabaseMySql();
        $usrDao = new UsuarioDao($dbMySql);

        $resultado = $usrDao->addUsr($usr);

        if($resultado == true) {
            //
            // Código para criar sessão do usuário
            //


            header("Location: ../../index.php");
            exit;
        } else {
            //
            // Codigo para criar variável de sessão e mandar uma mensagem de volta para a página de registro
            //

            header("Location: ../../login.php");
            exit;
        }

    } else {
        header("Location: ../../index.php");
        exit;
    }
?>