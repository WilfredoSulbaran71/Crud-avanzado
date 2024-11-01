<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM registros WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ver_registros.php");
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }

    $conn->close();
}
?>
