<?php
require "vendor/autoload.php";
require "config.php";

if($loggedUser == false) {
    $_SESSION["flash"] = "Você não está logado para fazer isso!";
    header("Location: login.php");
    exit;
}

require "src/paginas/default/header.php";
?>
    <body>
<?php
    require "src/paginas/default/navbar.php";
?>



<?php 
    require "src/paginas/default/footer.php";
?>