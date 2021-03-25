<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie-edge">
	<!--<link rel="stylesheet" type="text/css" href="noo.css"> -->
	<title>JookeBox</title>
</head>
<body>
	<h1>DATABASE SHOWS HERE</h1>


<?php

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
echo "connected succesfully";

//Query for printing device numbers which all installed on 12-2021
$sql = "SELECT * FROM jookbox";
$sql = "SELECT * FROM `devices` WHERE `dev_installation_date` = '2021-12-12 00:00:00'";
$result = $conn->query($sql);


if( $result->num_rows > 0 ){
	while($row = $result -> fetch_assoc()){
		echo "customers_id" . $row["customers_id"]."-date:" . $row["customers_id"] . "<br>";
	}
} else {
	echo "no result found";
}

$conn->close();

?>

</body>
</html>