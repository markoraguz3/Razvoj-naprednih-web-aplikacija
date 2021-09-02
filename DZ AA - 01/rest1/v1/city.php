<?php
// Connect to database
	include("../connection.php");
	include("../functions.php");
	$db = new dbObj();
	$connection =  $db->getConnstring();
 
	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
			// Retrive Products
			//print_r($_GET);
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				get_city($id);
			}
			else
			{
				get_city();
			}
			break;
			
			case 'POST':
			// Insert 
			insert_city();
			break;	
			
			case 'PUT':
			// Update 		
			if (isset($_GET["id"])){
				$id=intval($_GET["id"]);
				update_city($id);				
			}
			else{
				header('Content-Type: application/json');
				echo json_encode("Error while calling method and parametars");
				
			}				
			
			break;				
			case 'DELETE':
			// Delete
			$id=intval($_GET["id"]);
			delete_city($id);
			break;
			
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
?>
