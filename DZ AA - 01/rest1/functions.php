<?php

function get_city($id=0)
	{
	global $connection;
	$query="SELECT * FROM city";
	if($id != 0)
	{
		$query.=" WHERE cityNumber=".$id." LIMIT 100";
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
		$Number				=$data["number"];
		$Name				=$data["name"];
		$CountryCode		=$data["countrycode"];
		$district			=$data["district"];
		$population			=$data["population"];
		
		
		echo $query="INSERT INTO city VALUES (NULL, '".$number."','".$name."','".$countryCode."','".$district."','".$population."',NOW())";
		if(mysqli_query($connection, $query))
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'City added successfully'
			);
		}
		else
		{
			$broj_redaka = mysqli_affected_rows($connection);
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'City Adding Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
function update_city($id)
	{
		global $connection;
		$post_vars = json_decode(file_get_contents("php://input"),true);
		$Number				=$data["number"];
		$Name				=$data["name"];
		$CountryCode		=$data["countrycode"];
		$District			=$data["district"];
		$Population			=$data["population"];
		
		$query="UPDATE city SET Name='".$Name."', countrycode='".$CountryCode."', district='".$District."', population='".$Population."', WHERE CityNumber=".$id;
		
		$result=mysqli_query($connection, $query);
		$broj_redaka = mysqli_affected_rows($connection);;
		
		if($result)
		{
			$response=array(
				'status' => 1,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'City Updated Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'query' => $query,
				'broj_redaka' => $broj_redaka,
				'status_message' =>'City Updating Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}

function delete_city($id)
	{
	global $connection;
	$query="DELETE FROM city WHERE cityNumber=".$id;
	if($result = mysqli_query($connection, $query))
	{
		$response=array(
			'status' => 1,
			'status_message' =>'City Deleted Successfully.'
		);
	}
	else
	{
		$response=array(
			'status' => 0,
			'status_message' =>'City Deletion Failed.'
		);
	}
	header('Content-Type: application/json');
	echo json_encode($response);
	}


?>
