
<html>
<head>
<title>Update film</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="">
</head>
<body>
  <!--form for updating a film-->
<form action="updatedfilm.php" method="post">
<center>
  <h1>Update an existing film</h1>
  <p>Film Id:
  <input type="text" name="fid" size="30" value="" />
  </p>
  <p>New Title:
  <input type="text" name="title" size="30" value="" />
  </p>
  <p>New Year:
  <input type="text" name="year" size="30" value="" />
  </p>
  <p>New genre:
  <input type="text" name="genre" size="30" value="" />
  </p>
  <p>
  <input type="submit" name="submit" value="Send" />
  </p>
</center>
</form>
</body>
</html>
