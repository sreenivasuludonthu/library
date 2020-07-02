<?php
	include('connection.php');
	$userid=$_POST['uname'];
	$useremail=$_POST['email'];
		$ret=mysqli_query( $conn, "SELECT * FROM register WHERE id='$userid' AND email='$useremail' ") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
		if(!$row) 
		{//false
			echo '<script type="text/javascript">'; 
			echo 'alert("Username or Password incorrect");'; 
			echo 'window.location= "index.php";';
			echo '</script>';   
		}
		else 
		{  
			echo '<script type="text/javascript">';
			echo 'alert("Your Password '.$row['password'].'")';
			echo '</script>';			
		}
		echo '<script type="text/javascript">'; 
		echo 'window.location= "index.php";';
		echo '</script>';   
?>