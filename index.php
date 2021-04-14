<?php
ini_set('session.cookie_lifetime',60*60*24*1);
ini_set('session.gc-maxlifetime',60*60*24*1);
session_start();
  ?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css\index.css">
<script src="jquery-3.3.1.js"></script>
<script type="text/javascript" src="jquery-ui-1.12.1\jquery-ui.js"></script>
<link href ="jquery-ui-themes-1.10.4\themes\pepper-grinder\jquery.ui.theme.css" rel = "stylesheet">
<style>
img {
    width:;
    height:;
	padding:20px;
	position:middle;
	border-radius: 50px;
}
td{
	height:50px;
	vertical-align:middle;
	background-color:white;
	border-bottom: 1px solid #ddd;
	padding-top: 20px;
  padding-bottom: 20px;
  padding-left: 70px;
}
form.example input[type=submit] {
  float: left;
  width: 10%;
  padding: 10px;
  background:  #f1f1f1;
  color: grey;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  /*position:fixed;*/
  border-radius: 25px;
}
form.example input[type=text] {

  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 30%;
  background: #f1f1f1;
  border-radius: 25px;
  /*position:fixed;*/
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>
<h1  class="title"><img src="bgimages\logo.jpg" height="100"width="1100"></h1>
<div class="navbar">
  <a href="admin.php">Admin</a>
  <div class="subnav">
    <button class="subnavbtn">About <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="#company">college</a>
      <a href="#team">store</a>
      <a href="#careers">achivements</a>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">books<i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="cse.php">cse</a>
      <a href="eee.html">eee</a>
      <a href="ece.html">ece</a>
      <a href="mech.html">mech</a>
	  <a href="civil.html">civil</a>
    </div>
  </div>
  <div class="subnav">
    <button class="subnavbtn">Services <i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
     <a href="newlogin.php">login</a>
      <a href="newregister.php">register</a>
      <a href="logout.php">Logout</a>
     <a href="renewablebook.php">Renewable</a>
	 <a href="forgetpass.php">forget password</a>
	 <a href="pdfdownload.php">PDF Files</a>
    </div>
  </div> 
  <div class="subnav">
    <button class="subnavbtn">Faculty<i class="fa fa-caret-down"></i></button>
    <div class="subnav-content">
      <a href="facultylogin.php">Login</a>
      <a href="uploadfile.php">Upload File</a>
    </div>
  </div>
	<form class="example" action="search.php" method="post">
  <input type="text" placeholder="Search.." name="search">
  <input type="submit" value="search"><i class="fa fa-search">
</form>
</div>
<div class="image">
<img src="bgimages\library.jpg" width="98%" height="389 px">
</div>

</body>
</html>
<?php
include('connection.php');
$i = 1; 

$sql = "select * from totalbooks"; 
$result = $conn->query($sql); 
/*$row = mysql_fetch_array($result);*/

echo "<table border=\"1\"font-size=\"20\" align=\"center\"style='border-collapse:collapse;width:98%;'>"; 
while ($row = $result->fetch_assoc()) { 
  if ($i == 1) { 
     echo "<tr>"; 
  } 
 // echo "<td>BOOK_ID:::::::::::::::$row[id]<br>"; 
  echo "<td>BOOK_NAME  :::::::$row[name]<br>"; 
  //echo "AUTHOR_NAME:::$row[author]<br>"; 
   echo "BOOKING::::::::::::::<a href=\"verifylimit.php?book_id=" . $row['id'] . "\">CLICK HERE</a></td>"; 
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

