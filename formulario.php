<?php
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
    exit();
}

$nombre = $_SESSION['nombre'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $edad = htmlspecialchars(trim($_POST['edad']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefono = htmlspecialchars(trim($_POST['telefono']));
    ?>
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
                        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
                        <p><strong>Edad:</strong> <?php echo $edad; ?></p>
                        <p><strong>Email:</strong> <?php echo $email; ?></p>
                        <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
                    </div>
                </div>
            </div>
        </body>
    </html>
    <?php
    exit();
}
?>

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
            <div class="card shadow" style=" 50rem;">
                <h3 class="text-center">Bienvenido, <?php echo $nombre; ?></h3>
                <div class="card-body mb-3">
                    <label for="edad" class="form-label">Edad:</label>
                    <input type="number" class="form-control" id="edad" name="edad" required>
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