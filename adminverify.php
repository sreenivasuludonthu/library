<?php
		include('connection.php'); //code is given below (used for database connection)
		$user=$_POST['uname'];
		$pass=$_POST['psw'];
		if ($_POST['uname']=="admin" && $_POST['psw']=="password")
		{
			echo '<script type="text/javascript">'; 
			echo 'alert("you Are sucessfully login");'; 
			echo 'window.location= "home.html";';
			echo '</script>';   
		}
		else {  
			echo '<script type="text/javascript">'; 
			echo 'alert("User or Password incorrect");'; 
			echo 'window.location= "admin.php";';
			echo '</script>';   
		}
?>