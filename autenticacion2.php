<?php
    include 'funciones.inc';
    function usuario_existe($usuario, $contrasena) {
        // Aqui iria la logica para verificar si el usuario existe en la base de datos
        return (bool) rand(0,1);
    }

   function autenticacion ($mensaje){
        header("WWW-authenticate: Basic realm=\"$mensaje\"");
        echo 'Debe introducir un nombre y contraseña para acceder al sitio';
        echo '<a href="autenticacion2.php">Volver a intentarlo</a>';
        exit;
   }

   if (!isset($_SERVER['PHP_AUTH_USER'])) {
        autenticacion('MiSitio.com');
   } else {
        $usuario = $_SERVER['PHP_AUTH_USER'];
        $contrasena = $_SERVER['PHP_AUTH_PW'];

        if (usuario_existe($usuario, $contrasena)) {
            echo 'Bienvenido, ' . htmlspecialchars($usuario);
        } else {
            autenticacion('Usuario o contraseña incorrectos');
        }
   }
?>