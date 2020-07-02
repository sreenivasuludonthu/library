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
  width:80%;
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

$sql = "SELECT * FROM fileupload";
$result = $conn->query($sql);
/*echo "STUDENTS BOOKED BOOKS";*/
echo"<table align=\"center\"><th>File Name</th><th>Size(KB)</th><th>Faculty Name</th><th>Upload_Date</th><th>View</th><th>Confrom</th><th>Delete</th>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo"<tr >";
	echo "<td>".$row['file']."</td>";
	echo "<td>".$row['siz']."</td>";
	echo "<td>".$row['name']."</td>";
	echo "<td>".$row['uploaddate']."</td>";
	echo "<td><a href=\"uploads/"  .$row['file'] ."\">View</a></td>";
	echo "<td><a href=\"pdfconformation.php?file=" . $row['file'] . "\">Confrom</a></td>";
	echo "<td><a href=\"conformationdelete.php?file=" . $row['file'] . "\">Delete</a></td>";
	echo"</tr>";
	
    }
} /*else {
    echo "0 results";
}*/
echo"</table><br>";
$conn->close();
?>
</body>