<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}
include 'config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Registros</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Incluir el archivo CSS -->

</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                            <i class="fas fa-pen-square"></i> Crear Registro</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="ver_registros.php">
                            <i class="fas fa-list"></i> Ver Registros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <h2>Registros</h2>
    <div class="table-responsive">
        <table class="table table-hover table-bordered table-custom">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Fecha</th>
                    <th>Nombre del Cliente</th>
                    <th>Nombre del Proyecto</th>
                    <th>Nombre de la Actividad</th>
                    <th>Descripción</th>
                    <th>Correo Electrónico</th>
                    <th>Teléfono de Contacto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM registros";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["fecha"] . "</td>";
                        echo "<td>" . $row["nombre_cliente"] . "</td>";
                        echo "<td>" . $row["nombre_proyecto"] . "</td>";
                        echo "<td>" . $row["nombre_actividad"] . "</td>";
                        echo "<td>" . $row["descripcion"] . "</td>";
                        echo "<td>" . $row["correo_electronico"] . "</td>";
                        echo "<td>" . $row["telefono_contacto"] . "</td>";
                        echo "<td>
                            <a href='editar_registro.php?id=" . $row["id"] . "' class='btn btn-warning btn-sm btn-custom'>
                                <i class='fas fa-edit'></i>
                            </a>
                            <a href='eliminar_registro.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm btn-custom'>
                                <i class='fas fa-trash'></i>
                            </a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No hay registros</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
