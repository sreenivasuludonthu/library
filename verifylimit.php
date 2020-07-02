<?php
session_start();
	include('connection.php'); //code is given below (used for database connection)
	$i;
	//if(session_status()!==PHP_SESSION_ACTIVE)
	if(empty($_SESSION))
	{
		echo '<script type="text/javascript">'; 
		echo 'alert("something went worng pls login");'; 
		echo 'window.location= "newlogin.php";';
		echo '</script>';   
	}
	else
	{
		session_start();
		$users=$_SESSION['uname'];
		$pswd=$_SESSION['psw'];
		$book = $_GET['book_id'];
		$ret=mysqli_query( $conn, "SELECT * FROM limitstd WHERE rollnumber='$users'") or die("Could not execute query: " .mysqli_error($conn));
		$row = mysqli_fetch_assoc($ret);
		if(!$row) 
		{//false
			$ret=mysqli_query( $conn, "SELECT * FROM csebooks WHERE id='$book' ") or die("Could not execute query: " .mysqli_error($conn));
			$row = mysqli_fetch_assoc($ret);
			if(!$row) 
			{
				echo '<script type="text/javascript">'; 
				echo 'alert("This book is already booked");'; 
				echo 'window.location= "index.php";';
				echo '</script>';   
			}
			else
			{
				 $sql = "INSERT into limitstd( rollnumber,limi) values ('$users','1')";
				if(mysqli_query($conn,$sql)) 
				{ 	
					$sql= "INSERT into book (rollnumber,bookid,bookdate,submitdate)
					values ('$users','$book',CURDATE(),DATE_ADD(CURDATE(), INTERVAL 30 DAY))";
					if(mysqli_query($conn,$sql))
					{	
						$sql="DELETE FROM csebooks WHERE id='$book'";
						if ($conn->query($sql) == TRUE) 
						{
							echo '<script type="text/javascript">'; 
							echo 'alert("you Are sucessccfully booked a book");'; 
							echo 'window.location= "index.php";';
							echo '</script>';   
						}
					}  
					
				}
				else
				{
					echo '<script type="text/javascript">'; 
					echo 'alert("you Are unsucessccfully booked a book");'; 
					echo 'window.location= "index.php";';
					echo '</script>';   
					
				}
				
			}
		}
		else
		{	
			$sql = "select * from limitstd WHERE rollnumber='$users'"; 
			$result = $conn->query($sql); 
			while ($row = $result->fetch_assoc()) 
			{
				$i=$row['limi'];
				if($i==2)
				{
					echo '<script type="text/javascript">'; 
					echo 'alert("u cross ur booking limit pls try after returning books");'; 
					echo 'window.location= "index.php";';
					echo '</script>';
				}
				else
				{	
					$sql= "INSERT into book (rollnumber,bookid,bookdate,submitdate)
					values ('$users','$book',CURDATE(),DATE_ADD(CURDATE(), INTERVAL 30 DAY))";
					if(mysqli_query($conn,$sql))
					{	
						$sql = "UPDATE limitstd SET limi='2' WHERE rollnumber='$users'";
						if ($conn->query($sql) == TRUE) 
						{	
							$sql="DELETE FROM csebooks WHERE id='$book'";
							if ($conn->query($sql) == TRUE) 
							{
								echo '<script type="text/javascript">'; 
								echo 'alert("you Are sucessccfully booked a book");'; 
								echo 'window.location= "index.php";';
								echo '</script>';   
							}
						}
						else
						{
							echo '<script type="text/javascript">'; 
							echo 'alert("you Are unsucessccfully booked a book");'; 
							echo 'window.location= "index.php";';
							echo '</script>';
						}
					}
				}
			}
		}
		
	}
?>