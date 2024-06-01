<?php
require '../crud-php/config/database.php';

// Verificar si se ha enviado el ID del estudiante
if (isset($_GET['id'])) {
    // Obtener el ID del estudiante desde el parámetro GET
    $id = $_GET['id'];

    // Preparar y ejecutar la consulta para obtener los datos del estudiante
    $sql = "SELECT * FROM estudiantes WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    // Obtener los datos del estudiante
    $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontraron datos del estudiante
    if (!$estudiante) {
        // Redirigir o mostrar un mensaje de error si el estudiante no existe
        header("Location: ../views/error.php");
        exit();
    }
} else {
    // Redirigir o mostrar un mensaje de error si no se ha proporcionado el ID del estudiante
    header("Location: ../views/error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Estudiante</title>
    <link rel="stylesheet" href="../css/update.css">
</head>
<body>
    <h1>Actualizar Estudiante</h1>
    <form action='../src/update.php' method="post">
        <input type="hidden" name="id" value="<?php echo $estudiante['id']; ?>">
        <label for="nombre_completo">Nombre Completo:</label><br>
        <input type="text" id="nombre_completo" name="nombre_completo" value="<?php echo $estudiante['nombre_completo']; ?>" required><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $estudiante['fecha_nacimiento']; ?>" required><br><br>

        <label for="genero">Género:</label><br>
        <select id="genero" name="genero" required>
            <option value="Masculino" <?php if ($estudiante['genero'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
            <option value="Femenino" <?php if ($estudiante['genero'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
            <option value="Otro" <?php if ($estudiante['genero'] == 'Otro') echo 'selected'; ?>>Otro</option>
        </select><br><br>

        <label for="carrera">Carrera:</label><br>
        <select id="carrera" name="carrera" required>
            <option value="Ingeniería en Informática" <?php if ($estudiante['carrera'] == 'Ingeniería en Informática') echo 'selected'; ?>>Ingeniería en Informática</option>
            <option value="Contabilidad" <?php if ($estudiante['carrera'] == 'Contabilidad') echo 'selected'; ?>>Contabilidad</option>
            <option value="Comercio Internacional" <?php if ($estudiante['carrera'] == 'Comercio Internacional') echo 'selected'; ?>>Comercio Internacional</option>
            <option value="Medicina" <?php if ($estudiante['carrera'] == 'Medicina') echo 'selected'; ?>>Medicina</option>
        </select><br><br>

        <label for="materias_cursadas">Materias Cursadas:</label><br>
        <input type="number" id="materias_cursadas" name="materias_cursadas" value="<?php echo $estudiante['materias_cursadas']; ?>" required><br><br>

        <label for="numero_telefono">Número de Teléfono:</label><br>
        <input type="text" id="numero_telefono" name="numero_telefono" value="<?php echo $estudiante['numero_telefono']; ?>" required><br><br>

        <input type="submit" value="Actualizar Estudiante">
    </form>
</body>
</html>
