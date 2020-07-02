<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="";
$db="student";
$conn=new mysqli($dbhost,$dbuser,$dbpass,$db);
if($conn->connect_error)
{
	//echo"connection failed";
}
else
{
	//echo"connection was made";
}
?>