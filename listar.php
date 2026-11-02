<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebatecnica";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

//Example query
$sql = "SELECT * FROM estudiante";
$stmt = $conn->prepare($sql);


if ($stmt->execute()) {
  
    $estudiantes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar resultados
    if (count($estudiantes) > 0) {
        return json_encode($estudiantes);
        
    } else {
        echo "No hay registros.";
    }

} else {
    echo "Query execution failed.";
}

?>