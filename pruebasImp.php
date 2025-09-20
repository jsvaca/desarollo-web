<?php
    /*creacion de cookies
    $valor = 'texto de ejemplo';
    setcookie("PruebaCookie", $valor);
    setcookie("PruebaCookie", $valor, time()+3600); // Cookie válida por 1 hora

    if(isset($_COOKIE["PruebaCookie"])) {
        echo "Cookie 'PruebaCookie' está establecida con valor: " . $_COOKIE["PruebaCookie"] . "<br/>";
    } else {
        echo "Cookie 'PruebaCookie' no está establecida.<br/>";
    }*/
    
    //Sesiones en php
    session_start();
    
?>

<html>
    <head>
        <title>contador.php</title>
    </head>
    <body>
        <?php 
        if(!isset($_SESSION["contador"])) {
        $_SESSION["contador"] = 0;
        }
        ++$_SESSION["contador"];
        echo "<a href=\"pruebasImp.php\"> has recargado esta pagina " . $_SESSION["contador"] . " veces </a>";
        ?>
    </body>
</html>