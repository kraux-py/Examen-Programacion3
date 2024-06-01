<?php
require '../crud-php/config/database.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombreCompleto = $_POST['nombre_completo'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $carrera = $_POST['carrera'];
    $materiasCursadas = $_POST['materias_cursadas'];
    $numeroTelefono = $_POST['numero_telefono'];

    $sql = "INSERT INTO estudiantes (nombre_completo, fecha_nacimiento, genero, carrera, materias_cursadas, numero_telefono) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nombreCompleto, $fechaNacimiento, $genero, $carrera, $materiasCursadas, $numeroTelefono]);
        header("Location: read.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
