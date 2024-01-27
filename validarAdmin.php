<?php
$conn = new mysqli("localhost", "root", "", "registro_alumnos");

// Verifica la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Obtiene las credenciales del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta la base de datos para verificar las credenciales
$query = "SELECT * FROM administradores WHERE correo='$correo' AND contrasena='$contrasena'";
$result = $conn->query($query);

// Verifica si se encontraron resultados
if ($result->num_rows > 0) {
    // Credenciales válidas, redirige a la página deseada
    header("Location: adminSesion.php");
    exit(); // Importante salir después de redirigir
} else {
    // Credenciales inválidas, muestra un mensaje de error
    $mensajeError = "El correo o la contraseña no son del administrador.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
