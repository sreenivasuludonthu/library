<?php
session_start();
	include('connection.php'); //code is given below (used for database connection)
	if(empty($_SESSION))
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("something went worng pls login");'; 
		echo 'window.location= "newlogin.php";';
		echo '</script>';   
	}
	else
	{
		$users=$_SESSION['uname'];
		$book = $_POST['bookid'];
		$ret=mysqli_query( $conn, "SELECT * FROM book WHERE rollnumber='$users' AND bookid='$book' ") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
		if(!$row) 
		{
			
			echo '<script type="text/javascript">'; 
			echo 'alert("User name or Book_ID wrong");'; 
			echo 'window.location= "index.php";';
			echo '</script>';   
		}
		else
		{
			$sql= "INSERT into renewable (rollnumber,bookid,renewabledate,submitdate)
			values ('$users','$book',CURDATE(),DATE_ADD(CURDATE(), INTERVAL 30 DAY))";
			if(mysqli_query($conn,$sql))
			{	
				echo '<script type="text/javascript">'; 
				echo 'alert("you Are sucessccfully renewable ur book");'; 
				echo 'window.location= "index.php";';
				echo '</script>';   
			}
			echo '<script type="text/javascript">'; 
			echo 'alert("User name or Book_ID wrong");'; 
			echo 'window.location= "index.php";';
			echo '</script>';   
		}
	}
?>