<?php
include 'config.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM registros WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    } else {
        header("Location: ver_registros.php");
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $fecha = $_POST['fecha'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $nombre_proyecto = $_POST['nombre_proyecto'];
    $nombre_actividad = $_POST['nombre_actividad'];
    $descripcion = $_POST['descripcion'];
    $correo_electronico = $_POST['correo_electronico'];
    $telefono_contacto = $_POST['telefono_contacto'];

    $sql = "UPDATE registros SET fecha='$fecha', nombre_cliente='$nombre_cliente', nombre_proyecto='$nombre_proyecto',
            nombre_actividad='$nombre_actividad', descripcion='$descripcion', correo_electronico='$correo_electronico',
            telefono_contacto='$telefono_contacto' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: ver_registros.php");
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Editar Registro</h2>
        <form action="editar_registro.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $row['fecha']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre_cliente">Nombre del Cliente:</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="<?php echo $row['nombre_cliente']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre_proyecto">Nombre del Proyecto:</label>
                <input type="text" class="form-control" id="nombre_proyecto" name="nombre_proyecto" value="<?php echo $row['nombre_proyecto']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nombre_actividad">Nombre de la Actividad:</label>
                <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" value="<?php echo $row['nombre_actividad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required><?php echo $row['descripcion']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="<?php echo $row['correo_electronico']; ?>" required>
            </div>
            <div class="form-group">
                <label for="telefono_contacto">Teléfono de Contacto:</label>
                <input type="tel" class="form-control" id="telefono_contacto" name="telefono_contacto" value="<?php echo $row['telefono_contacto']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
