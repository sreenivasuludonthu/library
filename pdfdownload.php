<?php
include('connection.php');
$i = 1; 

$sql = "select * from conformpdf"; 
$result = $conn->query($sql); 
/*$row = mysql_fetch_array($result);*/

echo "<table border=\"1\"font-size=\"20\" align=\"center\"style='border-collapse:collapse;width:98%;'>"; 
while ($row = $result->fetch_assoc()) { 
  if ($i == 1) { 
     echo "<tr>"; 
  } 
  echo "<td>FILE_NAME::::$row[file]<br>"; 
  echo "FILE_TYPE  :::::$row[type]<br>"; 
  echo "FILE_SIZE:::::::$row[siz]<br>"; 
  echo "DOWNLOAD::::::::<a href=\"uploads/"  .$row['file'] ."\">CLICK HERE</a></td>";
  if ($i == 3) { 
     $i = 1; 
     echo "</tr>"; 
  } 
  else { 
     $i++; 
  } 
} 
echo "</table>";  
?>