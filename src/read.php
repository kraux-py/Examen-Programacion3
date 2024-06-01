<?php
require '../crud-php/config/database.php';

try {
    $sql = "SELECT * FROM estudiantes";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estudiantes</title>
    <link rel="stylesheet" href="../css/read.css">
</head>
<body>
    <h1>Lista de Estudiantes</h1>
    <a href="../views/create_form.php">Agregar Nuevo Estudiante</a>
    <table class="user-table">
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Fecha de Nacimiento</th>
            <th>Edad</th>
            <th>Género</th>
            <th>Carrera</th>
            <th>Materias Cursadas</th>
            <th>Número de Teléfono</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($estudiantes as $estudiante): ?>
            <tr>
                <td><?php echo $estudiante['id']; ?></td>
                <td><?php echo $estudiante['nombre_completo']; ?></td>
                <td><?php echo $estudiante['fecha_nacimiento']; ?></td>
                <td>
                    <?php
                    $fecha_nacimiento = new DateTime($estudiante['fecha_nacimiento']);
                    $hoy = new DateTime();
                    $edad = $hoy->diff($fecha_nacimiento);
                    echo $edad->y; 
                    ?>
                </td>
                <td><?php echo $estudiante['genero']; ?></td>
                <td><?php echo $estudiante['carrera']; ?></td>
                <td><?php echo $estudiante['materias_cursadas']; ?></td>
                <td><?php echo $estudiante['numero_telefono']; ?></td>
                <td>
                    <a href="../views/update_form.php?id=<?php echo $estudiante['id']; ?>">Editar</a>
                    <a href="../src/delete.php?id=<?php echo $estudiante['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
