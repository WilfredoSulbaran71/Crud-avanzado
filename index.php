<?php
session_start();
if (!isset($_SESSION['login_user'])) {
    header("location: login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Menú lateral -->
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                            <i class="fas fa-pen-square"></i> Crear Registro
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fas fa-calendar-alt"></i> Consultar por Fecha
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fas fa-solid fa-address-book"></i> Consultar por Cliente
                            </a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="ver_registros.php">
                             <i class="fas fa-list"></i> Ver Registros
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Formulario de registro -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2>Registrar Actividad</h2>
                <form action="procesar_registro.php" method="post">
                    <div class="form-group">
                        <label for="fecha">Fecha:</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_cliente">Nombre del Cliente:</label>
                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_proyecto">Nombre del Proyecto:</label>
                        <input type="text" class="form-control" id="nombre_proyecto" name="nombre_proyecto" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre_actividad">Nombre de la Actividad:</label>
                        <input type="text" class="form-control" id="nombre_actividad" name="nombre_actividad" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="correo_electronico">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
                    </div>
                    <div class="form-group">
                        <label for="telefono_contacto">Teléfono de Contacto:</label>
                        <input type="tel" class="form-control" id="telefono_contacto" name="telefono_contacto" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </main>
        </div>
    </div>



    <!-- Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
