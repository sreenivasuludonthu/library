<html>
<head>
<link rel="stylesheet" href="css\loginpage.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
input[type=file] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  border-radius: 25px;
}
</style>
</head>
<body>
<div class="bg-img">
  <form action="uploadfiles.php" method="POST" class="container" enctype="multipart/form-data">
    <h1>Upload File</h1>
	<input type="file" name="file" />
    <input type="submit" class="btn" name="Upload">
  </form>
</div>
</body>
</html>