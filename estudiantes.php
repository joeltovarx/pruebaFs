<?php
	// Include CORS headers
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
	header('Access-Control-Allow-Headers: X-Requested-With');
	header('Content-Type: application/json');

    
	// Include action.php file
	include_once 'crud.php';
	// Create object of estudiantes class
	$estudiante = new crud();

	// create a api variable to get HTTP method dynamically
	$api = $_SERVER['REQUEST_METHOD'];
    
	// get id from url
	$id = intval($_GET['id'] ?? '');
    
	// Get all or a single estudiante from database
	if ($api == 'GET') {
        
	  if ($id != 0) {
	    $data = $estudiante->fetch($id);
	  } else {
	    $data = $estudiante->fetch();
	  }
	  echo json_encode($data);
	}

	// Add a new estudiante into database
	if ($api == 'POST') {
	  $nombre = $estudiante->test_input($_POST['nombre']);
      
	  if ($estudiante->insert($nombre)) {
	    echo $estudiante->message('estudiante added successfully!',false);
	  } else {
	    echo $estudiante->message('Failed to add an estudiante!',true);
	  }
	}

	// Update an estudiante in database
	if ($api == 'PUT') {
     
	  $nombre =$_POST['nombre'];

	  if ($id != null) {
	    if ($estudiante->update($id,$nombre)) {
	      echo $estudiante->message('updated successfully!',false);
	    } else {
	      echo $estudiante->message('Failed to update!',true);
	    }
	  } else {
	    echo $estudiante->message('estudiante not found!',true);
	  }
	}

	// Delete an estudiante from database
	if ($api == 'DELETE') {
	  if ($id != null) {
	    if ($estudiante->delete($id)) {
	      echo $estudiante->message('estudiante deleted successfully!', false);
	    } else {
	      echo $estudiante->message('Failed to delete an estudiante!', true);
	    }
	  } else {
	    echo $estudiante->message('estudiante not found!', true);
	  }
	}

?>