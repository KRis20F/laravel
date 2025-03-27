<?php
// Incluimos el archivo de conexión a la base de datos
require_once 'connection.php';

// Verificamos si el formulario ha sido enviado mediante POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Preparamos la consulta SQL para insertar un nuevo usuario
        // Usamos consultas preparadas (?, ?, ?) para prevenir SQL Injection
        $stmt = $pdo->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
        
        // Ejecutamos la consulta con los valores del formulario
        // $_POST['name']: Nombre del usuario
        // $_POST['email']: Email del usuario
        // $_POST['age']: Edad del usuario
        $stmt->execute([$_POST['name'], $_POST['email'], $_POST['age']]);
        
        // Si todo sale bien, redirigimos a index.php con un mensaje de éxito
        header("Location: index.php?success=1");
        exit();
    } catch(PDOException $e) {
        // Si hay un error (por ejemplo, email duplicado), lo capturamos
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crear Usuario</title>
    <!-- Incluimos Bootstrap desde CDN para los estilos -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Crear Nuevo Usuario</h2>
        
        <!-- Mostramos mensajes de error si existen -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <!-- Formulario para crear usuario -->
        <form method="POST">
            <!-- Campo Nombre -->
            <div class="mb-3">
                <label>Nombre:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <!-- Campo Email -->
            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <!-- Campo Edad -->
            <div class="mb-3">
                <label>Edad:</label>
                <input type="number" name="age" class="form-control" required>
            </div>
            <!-- Botones de acción -->
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html> 