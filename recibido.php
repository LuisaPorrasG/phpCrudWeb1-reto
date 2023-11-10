<?php

// Conectar a la base de datos (asegúrate de actualizar las credenciales)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uniminuto1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}
// Obtener el nombre de la universidad desde el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_universidad = $_POST["nombre"];

    // Consulta SQL para insertar la nueva universidad en la base de datos
    $sql = "INSERT INTO universidades (nombre) VALUES ('$nombre_universidad')";

    // Ejecutar la consulta SQL y verificar si se realizó con éxito
    if ($conn->query($sql) === TRUE) {
        echo "Universidad registrada con éxito.";
    } else {
        echo "Error al registrar la universidad: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();


?>