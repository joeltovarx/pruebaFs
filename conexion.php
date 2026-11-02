<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebatecnica";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//Example query
$sql = "SELECT * FROM estudiante";
$stmt = $conn->prepare($sql);


if ($stmt->execute()) {
  
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    return $estudiantes;
    // Mostrar resultados
    if (count($estudiantes) > 0) {
        echo "<table border='1' cellpadding='5'>";
        echo "<tr><th>ID</th><th>Nombre</th></tr>";
        foreach ($estudiantes as $estudiante) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($estudiante['id_estudiante']) . "</td>";
            echo "<td>" . htmlspecialchars($estudiante['nombre']) . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No hay registros.";
    }

} else {
    echo "Query execution failed.";
}

?>
