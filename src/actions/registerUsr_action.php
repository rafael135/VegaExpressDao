<?php
    require "../../vendor/autoload.php";
    session_start();

    use Entities\Databases\DatabaseMySql;
    use Entities\Usuario;
    use Entities\UsuarioDao;

    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $cpf = filter_input(INPUT_POST, "cpf");


    $cpf = str_replace([".", "-"], "", $cpf);
    $senha = filter_input(INPUT_POST, "senha");
    
    

    if($nome && $email && $senha && $cpf) {
        $dbMySql = new DatabaseMySql();
        $usrDao = new UsuarioDao($dbMySql);

        if($usrDao->emailCadastrado($email) == true) {
            $_SESSION["flash"] = "O e-mail informado ja esta cadastrado!";
            header("Location: ../../register.php");
            exit;
        }

        $usr = new Usuario();
        $usr->setNome($nome);
        $usr->setCpf($cpf);
        $usr->setEmail($email);
        $usr->setSenha($senha);

        

        $resultado = $usrDao->addUsr($usr);

        if($resultado != false) {
            $token = $resultado;
            $_SESSION["token"] = $token;

            header("Location: ../../index.php");
            exit;
        } else {
            //
            // Codigo para criar variável de sessão e mandar uma mensagem de volta para a página de registro
            //

            header("Location: ../../register.php");
            exit;
        }

    } else {
        header("Location: ../../register.php");
        exit;
    }
?>