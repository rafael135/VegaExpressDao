<?php
    require "vendor/autoload.php";
    require "config.php";

    require "src/paginas/default/header.php";
    
?>

    <body>
        <?php require "src/paginas/default/navbar.php"; ?>


        <div class="container-fluid container-loginPage d-flex justify-content-center align-items-center">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <?php require("src/paginas/loginPages/register.php"); ?>
            </div>
        </div>




        

<?php require "src/paginas/default/footer.php"; ?>