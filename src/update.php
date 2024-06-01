<?php
require '../crud-php/config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombreCompleto = $_POST['nombre_completo'];
    $fechaNacimiento = $_POST['fecha_nacimiento'];
    $genero = $_POST['genero'];
    $carrera = $_POST['carrera'];
    $materiasCursadas = $_POST['materias_cursadas'];
    $numeroTelefono = $_POST['numero_telefono'];

    $sql = "UPDATE estudiantes SET nombre_completo = ?, fecha_nacimiento = ?, genero = ?, carrera = ?, materias_cursadas = ?, numero_telefono = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$nombreCompleto, $fechaNacimiento, $genero, $carrera, $materiasCursadas, $numeroTelefono, $id]);
        header("Location: read.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM estudiante WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$estudiante) {
        header("Location: read.php");
    }
} else {
    header("Location: read.php");
}
?>
