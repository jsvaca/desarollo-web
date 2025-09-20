<?php
    $config = include 'config.php';

try {
  $conexion = new PDO('mysql:host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['options']);
  $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $basesDisponibles = $conexion->query("SHOW DATABASES LIKE '" . $config['db']['name'] . "'")->fetchAll();
  if (count($basesDisponibles) == 0) {
    $sql = file_get_contents("data/proyecto.sql"); //si la base de datos no existe, la crea
  }else{
    $sql = "USE " . $config['db']['name'] . ";"; //si existe, la usa
  }

  $conexion->exec($sql);
    echo "<div style='text-align: center; margin-top: 50px;'>
            <h2 style='color: #d17a5c;'>¡Base de datos y tabla creadas con éxito!</h2>
          </div>";
} catch (PDOException $error) {
    echo "<div style='text-align: center; margin-top: 50px;'>
            <h2 style='color: red;'>Error:</h2>
            <p>" . $error->getMessage() . "</p>
          </div>";
}
?>
