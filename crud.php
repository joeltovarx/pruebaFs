<?php
	include_once 'conexion.php';

	
	class crud extends conexion {
        
	  public function fetch($id = 0) {
	    $sql = 'SELECT * FROM estudiante';
	    if ($id != 0) {
	      $sql .= ' WHERE id_estudiante = :id';
	    }

	    $stmt = $this->conn->prepare($sql);

		if ($id != 0){
			$stmt->execute(['id' => $id]);
		}else{
			$stmt->execute();
		}

	    $rows = $stmt->fetchAll();
	    return $rows;
	  }

	  
	  public function insert($nombre) {
	    $sql = 'INSERT INTO estudiante (nombre) VALUES (:nombre)';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['nombre' => $nombre]);
	    return true;
	  }


	// Update an user in the database
	public function update($id, $nombre) {
		$sql = 'UPDATE estudiante SET nombre = :nombre WHERE id_estudiante = :id';
		
		$stmt = $this->conn->prepare($sql);
		$stmt->execute(['nombre' => $nombre, 'id' => $id]);
		return true;
	}

	  
	  public function delete($id) {
	    $sql = 'DELETE FROM estudiante WHERE id_estudiante = :id';
	    $stmt = $this->conn->prepare($sql);
	    $stmt->execute(['id' => $id]);
	    return true;
	  }
	}

?>