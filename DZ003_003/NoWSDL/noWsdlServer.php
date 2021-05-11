<?php 
$conn = mysqli_connect("localhost", "root", "", "world") or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if(isset($_GET['officecode'])) {	
	$officecode = $_GET['countrycode']; 
	$sql_query = "select name, district, population from city where CountryCode = $officecode";
	$response = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));	
	$rows = array();
	while($r = mysqli_fetch_assoc($response)) {
    $rows[] = $r;
	}
	print_r("");
	print json_encode($rows);	
}
?>	
