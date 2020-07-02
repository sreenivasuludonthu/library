<?php
	include('connection.php');
	$sear=$_POST['search'];
	$ret=mysqli_query( $conn, "SELECT * FROM csebooks WHERE name='$sear'") or die("Could not execute query: " .mysqli_error($conn));
	$row = mysqli_fetch_assoc($ret);
	if(!$row) 
	{//false
		echo '<script type="text/javascript">'; 
		echo 'alert("This Book is already booked");'; 
		echo 'window.location= "index.php";';
		echo '</script>';   
	}
	else
	{
		echo "<table border=\"1\"font-size=\"20\" align=\"center\"style='border-collapse:collapse;width:50%;'>"; 
		echo "<tr>";  
		// echo "<td>BOOK_ID:::::::::::::::$row[id]<br>"; 
		echo "<td>BOOK_NAME  :::::::$row[name]<br>"; 
		//echo "AUTHOR_NAME:::$row[author]<br>"; 
		echo "BOOKING::::::::::::::<a href=\"verifylimit.php?book_id=" . $row['id'] . "\">CLICK HERE</a></td>"; 
		echo "</tr>"; 
		echo "</table>";  
	}
?>