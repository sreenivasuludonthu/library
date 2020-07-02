<?php
	include('connection.php');
	$userid=$_POST['sid'];
	$username=$_POST['sname'];
	$userbranch=$_POST['sbranch'];
	$usersection=$_POST['ssection'];
	$useremail=$_POST['semail'];
	$userpassword=$_POST['spassword'];
	$usermobile=$_POST['sphone'];
		$sql= "INSERT into register (id,name,branch,section,email,password,mobile,registerdate)
		values ('$userid','$username','$userbranch','$usersection','$useremail','$userpassword','$usermobile',CURDATE())";
		if(mysqli_query($conn,$sql))
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("U are Sucessfully registered");'; 
			echo 'window.location= "index.php";';
			echo '</script>';   
		}
		else
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("Something went worng pls try again");'; 
			echo 'window.location= "newregister.php";';
			echo '</script>';   
		}
?>