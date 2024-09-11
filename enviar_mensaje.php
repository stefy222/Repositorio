<?php
// Configuración de la base de datos
$host = 'localhost'; // o la dirección de tu servidor de base de datos
$dbname = 'portafolio'; // tu nombre de base de datos
$username = 'root'; // tu nombre de usuario de MySQL
$password = ''; // tu contraseña de MySQL

// Crear una conexión a la base de datos
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener datos del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Preparar la consulta SQL
    $stmt = $pdo->prepare("INSERT INTO contactos (nombre, email, mensaje) VALUES (:name, :email, :message)");

    // Ejecutar la consulta
    $stmt->execute([
        ':name' => $name,
        ':email' => $email,
        ':message' => $message
    ]);

    echo "Mensaje guardado con éxito.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
