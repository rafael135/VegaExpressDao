<?php
    require "../../vendor/autoload.php";
    session_start();

    use Entities\Databases\DatabaseMySql;
    use Entities\UsuarioDao;

    $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, "senha");
    

    if($email && $senha) {
        //$senha = password_hash($senha, PASSWORD_DEFAULT);

        $dbMySql = new DatabaseMySql();
        $usrDao = new UsuarioDao($dbMySql);
        
        if($usrDao->emailCadastrado($email) == true) {
            $resultado = $usrDao->login($email, $senha);

            if($resultado != false) {
                $_SESSION["token"] = $resultado;
                
                header("Location: ../../index.php");
                exit;
            } else {
                //
                // Codigo para criar variável de sessão e mandar uma mensagem de volta para a página de registro
                //
    
                header("Location: ../../login.php");
                exit;
            }
        }
    } else {
        header("Location: ../../login.php");
        exit;
    }
?>