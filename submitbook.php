<?php
	include('connection.php'); //code is given below (used for database connection)
	$user=$_POST['uname'];
	$pass=$_POST['bid'];
		$ret=mysqli_query( $conn, "SELECT * FROM book WHERE rollnumber='$user' AND bookid='$pass' ") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
		if(!$row) {//false
			echo '<script type="text/javascript">'; 
			echo 'alert("Username or BookID incorrect");'; 
			echo 'window.location= "submit.php";';
			echo '</script>';   
		}
		else {  
		$ret=mysqli_query( $conn, "SELECT * FROM limitstd WHERE rollnumber='$user'") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
			if($row)
			{
				$i=$row['limi'];
				if($i==1)
				{
					$sql="DELETE FROM limitstd WHERE rollnumber='$user'";
					if ($conn->query($sql) == TRUE) 
					{
						$sql="DELETE FROM book WHERE bookid='$pass'";
						if ($conn->query($sql) == TRUE) 
						{
							$sql= "INSERT INTO csebooks SELECT * FROM totalbooks WHERE id='$pass'";
							if(mysqli_query($conn,$sql))
							{
								echo '<script type="text/javascript">'; 
								echo 'alert("you Are sucessccfully Submitted a book");'; 
								echo 'window.location= "index.php";';
								echo '</script>';   
							}
						}
					}
				}
				else
				{
					$sql = "UPDATE limitstd SET limi='1' WHERE rollnumber='$user'";
					if ($conn->query($sql) == TRUE) 
					{	
						$sql="DELETE FROM book WHERE bookid='$pass'";
						if ($conn->query($sql) == TRUE) 
						{
							$sql= "INSERT INTO csebooks SELECT * FROM totalbooks WHERE id='$pass'";
							if(mysqli_query($conn,$sql))
							{
								echo '<script type="text/javascript">'; 
								echo 'alert("you Are sucessccfully Submitted a book");'; 
								echo 'window.location= "index.php";';
								echo '</script>';   
							}
						}
					}
				}
			}
		}
?>