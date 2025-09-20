<?php
    //archivo de inicio que muestra la tabla con los vehiculos
    include "conexion.php";

    $sql = "SELECT * FROM vehiculos";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $vehiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
 
<?php include "templates/header.php"; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Vehículos</h2>
    <div class="text-right mb-3">
        <a href="agregar.php" class="btn btn-primary">Agregar Vehículo</a>
    </div>
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Año</th>
                <th>Tipo</th>
                <th>Patente</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($vehiculos): ?>
                <!-- Si hay vehículos, los mostramos en la tabla -->
                <?php foreach ($vehiculos as $vehiculo): ?>
                    <tr>
                        <td><?= htmlspecialchars($vehiculo['ID']) ?></td>
                        <td><?= htmlspecialchars($vehiculo['marca']) ?></td>
                        <td><?= htmlspecialchars($vehiculo['modelo']) ?></td>
                        <td><?= htmlspecialchars($vehiculo['anno']) ?></td>
                        <td><?= htmlspecialchars($vehiculo['Tipo']) ?></td>
                        <td><?= htmlspecialchars($vehiculo['Patente']) ?></td>
                        <td>$<?= number_format($vehiculo['precio'], 2) ?></td>
                        <td>
                            <a href="editar.php?id=<?= $vehiculo['ID'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="borrar.php?id=<?= $vehiculo['ID'] ?>" class="btn btn-sm btn-danger">Borrar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center">No hay vehículos registrados</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php include "templates/footer.php"; ?>

