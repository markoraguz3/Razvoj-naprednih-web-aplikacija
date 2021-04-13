<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "world";
$search = $_REQUEST["s"];
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM country WHERE Name LIKE '%$search%' LIMIT 10";
$result = $conn->query($sql);

echo " <tr>
<th>Country</th>
<th>Continent</th>
<th>Region</th>
</tr>";

if ($result->num_rows  > 0){
	while ($myrow = $result->fetch_assoc()){
      if($myrow == []) {
        echo "asdsa";
    
      } 
      echo "<tr>
              <td>".$myrow["Name"]."</td>
              <td>".$myrow["Continent"]."</td>
              <td>".$myrow["Region"]."</td>
            </tr> ";
	}
}
else {
  echo "<tr><td></td><td style='text-align:center'>No data</td><td></td><tr>";
}

$conn->close();
?>