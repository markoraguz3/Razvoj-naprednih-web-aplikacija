<?php
$valid_passwords = array ("admin" => "admin");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
  header('WWW-Authenticate: Basic realm="My Realm"');
  header('HTTP/1.0 401 Unauthorized');
  die ("Not authorized");
}

// Connect to database
	Class dbObj{
	
	var $servername = "localhost";
	var $username = "root";
	var $password = "";
	var $dbname = "world";
	var $conn;
	function getConnstring() {
		$con = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());
 
		
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		} else {
			$this->conn = $con;
		}
		return $this->conn;
	}
}

function get_city($id=0)
{
	global $connection;
	$query="SELECT * FROM city";
	if($id != 0)
	{
		$query.=" WHERE city_number=".$id." LIMIT 100";
	}
	$response=array();
	$result=mysqli_query($connection, $query);
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$response[]=$row;
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}

function insert_city()
	{
		global $connection;

		$data = json_decode(file_get_contents('php://input'), true);
		$city_number		=$_POST["city_number"];
		$Name				=$_POST["name"];
		$country_code		=$_POST["country_code"];
		$district			=$_POST["district"];
		$population			=$_POST["population"];
		echo $query="INSERT INTO city(city_number, name, country_code, district, population)VALUES(".$city_number.",'".$city_name."','".$country_code."','".$district."','".$population."')";
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Add Successfully.'
			);
		}
		else
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Add Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_city($id)
	{
		global $connection;
		$post_vars = json_decode(file_get_contents("php://input"),true);
		$country_code		=$_POST["country_code"];
		$district		=$_POST["district"];
		$population	=$_POST["population"];
						
		$query="UPDATE city SET country_code='".$country_code."', district='".$district."', population='".$population."' WHERE city_number=".$id;
		
		$result=mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);;
		
		if($result)
		{
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Update Successfull.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'Update Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_city($id)
{
	global $connection;
	$query="DELETE FROM city WHERE city_number=".$id;
	if($result = mysqli_query($connection, $query))
	{
		
		$response=array(
			'status' => 1,
			'status_message' =>'Delete Successfull.'
		);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'Delete Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
}
	
	$db = new dbObj();
	$connection =  $db->getConnstring();
 
	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
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
			insert_city();
			break;	
			
			case 'PUT':
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
			$id=intval($_GET["id"]);
			delete_city($id);
			break;
			
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}
?>
