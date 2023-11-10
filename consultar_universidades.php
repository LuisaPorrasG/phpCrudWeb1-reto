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

// Consulta SQL para obtener datos de universidades
$sql = "SELECT * FROM universidades";
$result = $conn->query($sql);

// Crear un array para almacenar los resultados
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Agregar cada fila a la matriz de datos
        $data[] = $row;
    }
} else {
    $data[] = array('id' => 'N/A', 'nombre' => 'No se encontraron universidades.');
}

// Cerrar la conexión a la base de datos
$conn->close();

// Enviar los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
