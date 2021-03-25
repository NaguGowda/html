<!DOCTYPE html>
<html>

<!-- HERE I USED HTML AND PHP, XAAMP  -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<title>JookeBox</title>
</head>
<body>

<?php
#connecting the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jookbox";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

echo "connected succesfully<br>";

#queries for handling the database

$sql = "SELECT * FROM `devices` WHERE `dev_installation_date` = '2021-12-12 00:00:00' ORDER BY `dev_installation_date` DESC;";

$sql .= "SELECT * FROM `customers` WHERE `customer_name` LIKE '%john%' ORDER BY `customer_name` DESC;";

$sql .= "SELECT * FROM `venues` GROUP BY venue_name having COUNT(venues_id)>1;";


#checking and executing multiple queries 

if($conn-> multi_query($sql)){
	do{

		$result = $conn->store_result();
		#rows value stored in var
		echo "records:" . $result-> num_rows;
		#table creation 
		echo "<hr width='100px' align='left'/>";
		#fetching the perticuler table with column value
		$finfo = $result->fetch_fields();
		echo "<table border = '0'>";
		echo "<tr>";
		#store in increment
		foreach ($finfo as $f) 
		{
			echo "<th>" . $f->name . "</th>";
		}
		echo "</tr>";
		#retrieve the data from tables
		while ($row = $result->fetch_assoc()) 
		{
			echo "<tr>";
			echo "<tr>";
			foreach ($row as $k) 
			{

				echo "<td>" . $k . "</td>";
				# code...
			}echo "</tr>";

		}	echo "</table>";

		#close the table
		#checking the move to the next query for execution of data
	} while ($conn->more_results() && $conn->next_result());
}

?>

</body>
</html>