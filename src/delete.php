<?php
require '../crud-php/config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM estudiantes WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([$id]);
        header("Location: read.php");
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: read.php");
}
?>
