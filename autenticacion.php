<?php
    //Ejemplo de script php que muestra un formulario de login
    //funcion de verificacion de que el usuario existe, sin definir
    //inclusion del archivo que contiene las funciones generales.
    include 'funciones.inc';

    //funcion que verifica que las credenciales de identificacion
    //introducidas son correctas.
    function usuario_existe($usuario, $contrasena) {
        // Aqui iria la logica para verificar si el usuario existe en la base de datos
        return (bool) rand(0,1);
    }

    //Inicializacion de las variables.
    $usuario = '';
    $contrasena = '';
    $mensaje = '';
    //Procesamiento del formulario
    if (isset($_POST['conexion'])) {
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        if (usuario_existe($usuario, $contrasena)) {
            $mensaje = 'Bienvenido, ' . htmlspecialchars($usuario);
        } else {
            $mensaje = 'Usuario o contraseña incorrectos.';
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Formulario de Login</title>
</head>
<body>
    <form action="autenticacion.php" method="post">
        <table style="border: 0;">
            <tr>
                <td>Usuario:</td>
                <td><input type="text" name="usuario" value="<?php echo htmlspecialchars($usuario); ?>" /></td>
            </tr>
            <tr>
                <td>Contraseña:</td>
                <td><input type="password" name="contrasena" /></td>
            </tr>
            <tr>
                <td style="text-align: right;"><input type="submit" name="conexion" value="Conexión" /></td>
            </tr>
        </table>
    </form>
    <p><?php echo $mensaje; ?></p>
</body>
</html>