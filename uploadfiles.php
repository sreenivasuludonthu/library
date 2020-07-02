<?php
session_start();
include('connection.php');   
$i;    
	if(empty($_SESSION))
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("something went worng pls login");'; 
		echo 'window.location= "facultylogin.php";';
		echo '</script>';   
	}
	else
	{
		$users=$_SESSION['uname'];
		$ret=mysqli_query( $conn, "SELECT * FROM faculty WHERE id='$users'") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
		if(!$row) 
		{//false
			echo '<script type="text/javascript">'; 
			echo 'alert("something went worng ");'; 
			echo 'window.location= "index.php";';
			echo '</script>';   
		}
		else
		{
			/*$sql = "select * from faculty WHERE rollnumber='$users'"; 
			$result = $conn->query($sql); 
			while ($row = $result->fetch_assoc()) 
			{*/
			$i=$row['name'];
			$file =".".rand(1000,100000)."-".$_FILES['file']['name'];
			$file_loc = $_FILES['file']['tmp_name'];
			$file_size = $_FILES['file']['size'];
			$file_type = $_FILES['file']['type'];
			$folder="uploads/";
			move_uploaded_file($file_loc,$folder.$file);
			$sql="INSERT INTO fileupload(file,type,siz,name,uploaddate) VALUES('$file','$file_type','$file_size','$i',CURDATE())";
			// mysql_query($sql); 
			if(mysqli_query($conn,$sql))
			{	
				echo '<script type="text/javascript">'; 
				echo 'alert("U are Sucessfully Upload File");'; 
				echo 'window.location= "index.php";';
				echo '</script>';   
			}
			else
			{
				echo '<script type="text/javascript">'; 
				echo 'alert("Something went worng pls try again");'; 
				echo 'window.location= "uploadfile.php";';
				echo '</script>';   
			}
			/*}*/
		}
	}
?>