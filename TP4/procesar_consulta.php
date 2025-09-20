<?php
$config = include 'config.php';
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'],
         $config['db']['options']);
        $consultaSQL = "SELECT * FROM vehiculos WHERE ID = :codigo";
        $sentencia = $conexion->prepare($consultaSQL);
        $sentencia->bindParam(':codigo', $codigo, PDO::PARAM_INT);  
        $sentencia->execute();
        $consulta = $sentencia->fetch(PDO::FETCH_ASSOC);
        echo json_encode($consulta, JSON_PRETTY_PRINT);
    } catch (PDOException $error) {
        echo json_encode(array("error" => "Error de conexión: " . $error->getMessage()));
        exit();
    }
}
?>