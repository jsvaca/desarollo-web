<?php
    //archivo para editar vehiculos
    $config = include 'config.php';

    $resultado = [
        'error' => false,
        'mensaje' => ''
    ];

    if (!isset($_GET['id'])) {
        $resultado['error'] = true;
        $resultado['mensaje'] = 'El vehículo no existe';
    }

    if (isset($_POST['submit'])) {
        try {
            $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
            $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            // array con los datos del formulario
            $vehiculo = [
                "id" => $_GET['id'],
                "marca" => $_POST['marca'],
                "modelo" => $_POST['modelo'],
                "anno" => $_POST['anno'],
                "Tipo" => $_POST['Tipo'],
                "Patente" => $_POST['Patente'],
                "precio" => $_POST['precio']
            ];
            // consulta SQL para actualizar el vehiculo
            $consultaSQL = "UPDATE vehiculos SET
                marca = :marca,
                modelo = :modelo,
                anno = :anno,
                Tipo = :Tipo,
                Patente = :Patente,
                precio = :precio
                WHERE ID = :id";
            // preparar y ejecutar la consulta
            $sentencia = $conexion->prepare($consultaSQL);
            $sentencia->execute($vehiculo);

            $resultado['mensaje'] = 'El vehículo ha sido actualizado correctamente';
        } catch (PDOException $error) {
            $resultado['error'] = true;
            $resultado['mensaje'] = $error->getMessage();
        }
    }

    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

        $id = $_GET['id'];
        $consultaSQL = "SELECT * FROM vehiculos WHERE ID = :id";

        $sentencia = $conexion->prepare($consultaSQL);
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->execute();

        $vehiculo = $sentencia->fetch();

        if (!$vehiculo) {
            $resultado['error'] = true;
            $resultado['mensaje'] = 'El vehículo no existe';
        }
    } catch (PDOException $error) {
        $resultado['error'] = true;
        $resultado['mensaje'] = $error->getMessage();
    }
?>

<?php include "templates/header.php"; ?>
<div class="container mt-5">
    <h2 class="text-center mb-4">Editar Vehículo</h2>

    <?php if ($resultado['error']): ?>
        <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($resultado['mensaje']) ?>
        </div>
    <?php else: ?>
        <form method="post">
            <div class="form-group">
                <label for="marca">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" value="<?= htmlspecialchars($vehiculo['marca']) ?>" required>
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="<?= htmlspecialchars($vehiculo['modelo']) ?>" required>
            </div>
            <div class="form-group">
                <label for="anno">Año</label>
                <input type="number" class="form-control" id="anno" name="anno" value="<?= htmlspecialchars($vehiculo['anno']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Tipo">Tipo</label>
                <input type="text" class="form-control" id="Tipo" name="Tipo" value="<?= htmlspecialchars($vehiculo['Tipo']) ?>" required>
            </div>
            <div class="form-group">
                <label for="Patente">Patente</label>
                <input type="text" class="form-control" id="Patente" name="Patente" value="<?= htmlspecialchars($vehiculo['Patente']) ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?= htmlspecialchars($vehiculo['precio']) ?>" required>
            </div> 
            <button type="submit" name="submit" class="btn btn-primary">Actualizar Vehículo</button>
            <a href="inicio.php" class="btn btn-secondary">Cancelar</a>
        </form>
    <?php endif; ?>
</div>

<?php include "templates/footer.php"; ?>