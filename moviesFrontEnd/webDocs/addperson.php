<html>
<head>
<title>Add person</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="">
</head>
<body>
  <!--form for adding a person-->
<form action="addedperson.php" method="post">
<center>
  <h1>Add a New person</h1>
  <p>Last Name:
  <input type="text" name="lastname" size="30" value="" />
  </p>
  <p>First Name:
  <input type="text" name="firstname" size="30" value="" />
  </p>
  <p>Date of Birth (Year):
  <input type="text" name="dob" size="30" value="" />
  </p>
  <p>role:
  <input type="text" name="role" size="30" value="" />
  </p>
  <p>
  <input type="submit" name="submit" value="Send" />
  </p>
</center>
</form>
</body>
</html>
