<html>
<head>
<style>
body{
	background-color:#ccccff;
}
table{
	padding-top: 30px;
	align:center;
	border-collapse:collapse;
  display: table;
  border-radius: 10px;
  width:70%;
}
th{
	background-color:#8080ff;
	color:white;
	font-family: sans-serif;
	height:50px;
	border-bottom: 1px solid #ddd;
	padding: 8px;
}
td{
	height:50px;
	vertical-align:middle;
	background-color:white;
	border-bottom: 1px solid #ddd;
	padding-top: 20px;
  padding-bottom: 20px;
  padding-left: 70px;
}
	
</style>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "student";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM book";
$result = $conn->query($sql);
/*echo "STUDENTS BOOKED BOOKS";*/
echo"<table align=\"center\"><th>Roll number</th><th>Book_ID</th><th>Book_Date</th><th>Submit_Date</th>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo"<tr >";
	echo "<td>".$row['rollnumber']."</td>";
	echo "<td>".$row['bookid']."</td>";
	echo "<td>".$row['bookdate']."</td>";
	echo "<td>".$row['submitdate']."</td>";
	
	echo"</tr>";
	
    }
} /*else {
    echo "0 results";
}*/
echo"</table><br>";
$conn->close();
?>
</body>