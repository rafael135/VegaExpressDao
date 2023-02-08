<?php
    require "vendor/autoload.php";
    use Entities\UsuarioDao;
    use Entities\Databases\DatabaseMySql;

    $engine = new DatabaseMySql();

    $usrDao = new UsuarioDao($engine);

    $usrs = $usrDao->getAllUsr();

    require "src/paginas/header.php";


?>
    <body>
<?php
    require "src/paginas/navbar.php";
?>

<?php 
    if($usrs != false) {
        foreach($usrs as $usr) {
            echo $usr->getId() . "<br/>";
        }
    }
?>




<?php
    require "src/paginas/footer.php";
?>