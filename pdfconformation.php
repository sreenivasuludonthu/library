<?php
include('connection.php');
$filen = $_GET['file'];
$ret=mysqli_query( $conn, "SELECT * FROM conformpdf WHERE file='$filen' ") or die("Could not execute query: " .mysqli_error($conn));
$row = mysqli_fetch_assoc($ret);
if(!$row) 
{
	$sql= "INSERT INTO conformpdf SELECT * FROM fileupload WHERE file='$filen'";
	if(mysqli_query($conn,$sql))
	{
		/*$sql="DELETE FROM fileupload WHERE file='$filen'";
		if ($conn->query($sql) == TRUE) 
		{*/
			echo '<script type="text/javascript">'; 
			echo 'alert("you Are sucessccfully Uploaded PDF");'; 
			echo 'window.location= "facultynonpdf.php";';
			echo '</script>';
		/*}*/
	}
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("This PDF is already Uploaded");'; 
	echo 'window.location= "facultynonpdf.php";';
	echo '</script>';   
}