<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = $_POST['fecha'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $nombre_proyecto = $_POST['nombre_proyecto'];
    $nombre_actividad = $_POST['nombre_actividad'];
    $descripcion = $_POST['descripcion'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono_contacto = $_POST['telefono_contacto'];

    $sql = "INSERT INTO registros (fecha, nombre_cliente, nombre_proyecto, nombre_actividad, descripcion, correo_electronico, telefono_contacto)
            VALUES ('$fecha', '$nombre_cliente', '$nombre_proyecto', '$nombre_actividad', '$descripcion', '$correo_electronico', '$telefono_contacto')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
}
?>
