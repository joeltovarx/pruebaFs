<?php

class conexion {
    
    private const servername = "localhost";
    private const username = "root";
    private const password = "";
    private const dbname = "pruebatecnica";
   
    // Data Source Network
    private $dsn = 'mysql:host=' . self::servername . ';dbname=' . self::dbname . '';
    // conn variable
    protected $conn = null;

    // Constructor Function
    public function __construct() {
    try {
        $this->conn = new PDO($this->dsn, self::username, self::password);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die('Connectionn Failed : ' . $e->getMessage());
    }
    return $this->conn;
    }

    // Sanitize Inputs
    public function test_input($data) {
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }


    // JSON Format Converter Function
    public function message($content, $status) {
    return json_encode(['message' => $content, 'error' => $status]);
    }

}

?>
