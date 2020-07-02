<?php
include('connection.php');
$filen = $_GET['file'];
$sql="DELETE FROM fileupload WHERE file='$filen'";
if ($conn->query($sql) == TRUE) 
{
	echo '<script type="text/javascript">'; 
	echo 'alert("you Are sucessccfully Deleted PDF");'; 
	echo 'window.location= "facultynonpdf.php";';
	echo '</script>';
}
else
{
	echo '<script type="text/javascript">'; 
	echo 'alert("Sorry something went worng");'; 
	echo 'window.location= "facultynonpdf.php";';
	echo '</script>';   
}