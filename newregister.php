<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body, html {
  height: 100%;
  font-family: Arial, Helvetica, sans-serif;
  background-color:#ccccff;
}

* {
  box-sizing: border-box;
}

.bg-img {
  /* The image used */
  /*background-image: url("bgimages/college.jpeg");*/

  min-height: 500px;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Add styles to the form container */
.container {
  position: absolute;
  right: 0;
  margin: 20px;
  max-width: 700px;
  padding: 16px;
  background-color: white;
  border-radius: 25px;
}
.box {
  position:fixed;
  right: 1;
  margin: 20px;
  max-width: 500px;
  padding: 20px;
  background-color: white;
  border-radius: 25px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  border-radius: 25px;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit button */
.btn {
  background-color:#8080ff;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
  border-radius: 25px;
}

.btn:hover {
  opacity: 1;
}
h3{
		text-align: justify;
		 padding: 16px 20px;
	font-size: 18px;
}
h2 {
	margin-top: 0;
	font-size: 26px;
}
</style>
</head>
<body>
<div class="box">

<h2><b>Instruction:</br></h2>
<h3>
->Logout after completion of booking books</br>
->A Student can book only 2 books<br>
->Don't Refresh the page.<br>
->If you refresh you web page<br>
->If browser crashes close it.<br>
->After finishing, close the browser.<br>
</h3>
</div>
<div class="bg-img">
  <form action="registernew.php" class="container" method="POST">
    <label for="email"><b>Rollnumber</b></label>
    <input type="text" placeholder="Enter Ur Rollnumber" name="sid" required autocomplete="off">

    <label for="psw"><b>Name</b></label>
    <input type="text" placeholder="Enter Ur Name" name="sname" required autocomplete="off">
	  <label for="email"><b>Branch</b></label>
    <input type="text" placeholder="Enter Ur Branch" name="sbranch" required>

    <label for="psw"><b>Section</b></label>
    <input type="text" placeholder="Enter Ur Section" name="ssection" required>
	  <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Ur Email" name="semail" required autocomplete="off">

    <label for="psw"><b>Password</b></label>
    <input type="text" placeholder="Create Ur Own Password" name="spassword" required autocomplete="off">
	  <label for="email"><b>Phone number</b></label>
    <input type="text" placeholder="Enter Ur Phone number" name="sphone" required autocomplete="off">
    <input type="submit" class="btn" value="register">
	</form>
</div>
</body>
</html>
