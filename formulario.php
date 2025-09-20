<?php
session_start(); //inicio sesion o tomo la que esta iniciada

//si no esta seteada la variable de sesion nombre vuelvo a la pantalla anterior
if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

$nombre = $_SESSION['nombre'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    ?>    <!-- Si es verdadera la condicion del if cierro la porcion de codigo php -->
    <!-- Generacion del codigo para mostrar los valores cargados anteriormente en la misma pagina-->
    <!-- este codigo reemplaza a la pantalla formulario.php -->
    <!DOCTYPE html>
    <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale = 1">
            <title>Datos ingresados</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
                integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <style>
                body {
                    background-color: #f8f9fa;
                }
                .card {
                    max-width: 600px;
                    text-align: text-center;
                    background-color: aquamarine;
                }
            </style>
        </head>
        <body>
            <div class="container d-flex justify-content-center align-items-center vh-100">
                <div class="card shadow" style="width: 40 rem">
                    <div class="card-body">
                        <h3 class="text-center">Datos ingresados</h3>
                        <!-- Recorremos la variable $_POST para mostrar los datos ingresados -->
                        <?php foreach ($_POST as $key => $value) {
                                echo "<p><strong>" . htmlspecialchars($key) . ":</strong> " . htmlspecialchars($value) . "</p>";
    }                   ?>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <?php
    exit();
}
?>
<!-- Generacion del formulario para ingresar los datos -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <title>Ingresar datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            max-width: 600px;
            text-align: text-center;
            background-color: aquamarine;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center">
        
        <form class="container d-flex justify-content-center align-items-center vh-100" method="POST" action="">
            <div class="card shadow" style=" 20rem;">
                <h3 class="text-center">Bienvenido</h3>
                <div class="card-body mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" required>
                </div>
                <div class="card-body mb-3">
                    <label for="edad" class="form-label">Edad:</label>
                    <input type="number" class="form-control" id="edad" name="edad" required>
                </div>
                 <div class="card-body mb-3">
                    <label for="Fecha" class="form-label">Fecha de nacimiento:</label>
                    <input type="date" class="form-control" id="Fecha" name="Fecha" required>
                </div>
                <div class="card-body mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="card-body mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" required>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>