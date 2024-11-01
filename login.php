<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $sql = "SELECT id FROM usuarios WHERE correo = '$correo' AND clave = '$clave'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['login_user'] = $correo;
        header("location: index.php");
    } else {
        $error = "Correo o clave inválidos.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Añade Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Aquí es donde irá tu contenido -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="text" class="form-control" name="correo" id="correo">
                            </div>
                            <div class="form-group">
                                <label for="clave">Clave:</label>
                                <input type="password" class="form-control" name="clave" id="clave">
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </form>
                        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Añade Bootstrap JS y dependencias -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
