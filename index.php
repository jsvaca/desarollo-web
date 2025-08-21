<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === "POST"){
        $nombre =trim($_POST['nombre']);

        if (!empty($nombre)){
            $_SESSION['nombre'] = $nombre;
            header("Location: formulario.php");
            exit();
        } else {
            $error = "El campo nombre no puede estar vacío.";
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <title>Inicio Sesion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            max-width: 500px;
            text-align: text-center;
            background-color: aquamarine;
        }
        label{
            margin: 10px;
        }
        input{
            margin: 10px;
        }
        button{
            margin: 10px;
        }
    </style>
</head>
<body>
    <h2 class="text-center">Ingresar Nombre</h2>
    <?php if (!empty($error)): echo "<p style='color:red'>$error</p>"; endif; ?>
    <form class = "d-flex justify-content-center align-items-center vh-100" method="POST" action="">
        <div class="card shadow" style="width: 22rem;">
            <div class="card-body mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>