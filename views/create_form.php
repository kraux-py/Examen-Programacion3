<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Estudiante</title>
    <link rel="stylesheet" href="../css/form_c.css">
</head>
<body>
    <h1>Crear Nuevo Estudiante</h1>
    <form action="../src/create.php" method="post">
        <label for="nombre_completo">Nombre Completo:</label><br>
        <input type="text" id="nombre_completo" name="nombre_completo" required><br><br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br><br>

        <label for="genero">Género:</label><br>
        <select id="genero" name="genero" required>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select><br><br>

        <label for="carrera">Carrera:</label><br>
        <select id="carrera" name="carrera" required>
            <option value="Ingeniería en Informática">Ingeniería en Informática</option>
            <option value="Contabilidad">Contabilidad</option>
            <option value="Comercio Internacional">Comercio Internacional</option>
            <option value="Medicina">Medicina</option>
        </select><br><br>

        <label for="materias_cursadas">Materias Cursadas:</label><br>
        <input type="number" id="materias_cursadas" name="materias_cursadas" required><br><br>

        <label for="numero_telefono">Número de Teléfono:</label><br>
        <input type="text" id="numero_telefono" name="numero_telefono" required><br><br>

        <input type="submit" value="Crear Estudiante">
    </form>
</body>
</html>
