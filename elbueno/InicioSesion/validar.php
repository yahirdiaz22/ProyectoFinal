<?php
// Obtén los datos del formulario de inicio de sesión
$email = $_POST['correo'];
$password=(isset($_POST[md5('password')])?$_POST[md5('password')]:"");
// Conecta a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "biblio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Prepara la consulta SQL para obtener los datos del usuario por email
$sql = "SELECT idUsuario, nombre, correo, md5[password] FROM usuario WHERE correo = '$email'";
$resultado = $conn->query($sql);

// Verifica si se encontró un usuario con el email proporcionado
if ($resultado->num_rows == 1) {
    $fila = $resultado->fetch_assoc();
    $hashContraseña = $fila['password'];

    // Verifica si la contraseña ingresada coincide con el hash almacenado
    if (password_verify($password, $hashContraseña)) {
        // Inicio de sesión exitoso, puedes realizar las acciones necesarias
        session_start();
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['password'] = $fila['password'];

        header("https://localhost/web/elbueno/Menu/");
        exit();
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta.";
    }
} else {
    // No se encontró un usuario con el email proporcionado
    echo "Email no encontrado.";
}

// Cierra la conexión
$conn->close();
?>