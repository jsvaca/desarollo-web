<?php
    include "conexion.php";

    $resultado = [
        'error' => false,
        'mensaje' => ''
    ];

    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
        $id = $_GET['id'];
        // Consulta SQL para borrar el vehículo por ID
        $consultaSQL = "DELETE FROM vehiculos WHERE ID = :id";

        // Preparar y ejecutar la consulta
        $sentencia = $conexion->prepare($consultaSQL);
        $sentencia->bindParam(':id', $id, PDO::PARAM_INT);
        $sentencia->execute();

        header('Location: inicio.php');
    } catch (PDOException $error) {
        $resultado['error'] = true;
        $resultado['mensaje'] = $error->getMessage();
    }
?>

<?php include "templates/header.php"; ?>
<div class="container mt-4">
    <?php if ($resultado['error']): ?>
        <div class="alert alert-danger"><?= $resultado['mensaje'] ?></div>
    <?php endif; ?>
</div>
<?php include "templates/footer.php"; ?>
