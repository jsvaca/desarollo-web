<?php
    //pantalla para agregar vehiculos
    if (isset($_POST['submit'])) {
        $resultado = ['error' => false, 'mensaje' => 'El vehículo ' . $_POST['marca'] . ' ' . $_POST['modelo'] . ' ha sido agregado con éxito'];

        //traer la configuracion de la base de datos
        $config = include 'config.php';

        try {
            $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
            $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            //crear un array con los datos del formulario
            $vehiculo = [
                "marca" => $_POST['marca'],
                "modelo" => $_POST['modelo'],
                "anno" => $_POST['anno'],
                "Tipo" => $_POST['Tipo'],
                "Patente" => $_POST['Patente'],
                "precio" => $_POST['precio']
            ];
            //crear la consulta SQL
            $consultaSQL = "INSERT INTO vehiculos (marca, modelo, anno, Tipo, Patente, precio) VALUES 
                           (:" . implode(", :", array_keys($vehiculo)) . ")";
            //preparar la consulta
            $sentencia = $conexion->prepare($consultaSQL);
            //ejecutar la consulta
            $sentencia->execute($vehiculo);

        } catch (PDOException $error) {
            $resultado['error'] = true;
            $resultado['mensaje'] = $error->getMessage();
        }
    }
?>

<?php include 'templates/header.php'; ?>
<div class="container mt-4">
    <h2 class="text-center">Agregar Vehículo</h2>
    <?php if (isset($resultado)): ?>
        <div class="alert alert-<?= $resultado['error'] ? 'danger' : 'success' ?> mt-4">
            <?= $resultado['mensaje'] ?>
        </div>
    <?php endif; ?>
    <form method="post">
        <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" id="marca" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" id="modelo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="anno">Año</label>
            <input type="number" name="anno" id="anno" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Tipo">Tipo</label>
            <input type="text" name="Tipo" id="Tipo" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="Patente">Patente</label>
            <input type="text" name="Patente" id="Patente" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" id="precio" class="form-control" step="0.01" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Agregar Vehículo</button>
        <a href="inicio.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php include 'templates/footer.php'; ?>