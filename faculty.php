<?php
session_start();
	include('connection.php'); //code is given below (used for database connection)
	$user=$_POST['uname'];
	$pass=$_POST['psw'];
		$ret=mysqli_query( $conn, "SELECT * FROM faculty WHERE id='$user' AND password='$pass' ") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
		if(!$row) {//false
			echo '<script type="text/javascript">'; 
			echo 'alert("Username or Password incorrect");'; 
			echo 'window.location= "newlogin.php";';
			echo '</script>';   
		}
		else {  
			$_SESSION['uname']=$user;
			$_SESSION['psw']=$pass;
			echo '<script type="text/javascript">'; 
			echo 'alert("you Are sucessfully login");'; 
			echo 'window.location= "index.php";';
			echo '</script>';   
		}
?>