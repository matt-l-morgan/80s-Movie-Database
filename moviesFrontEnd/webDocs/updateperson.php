
<html>
<head>
<title>Update Person</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="">
</head>
<body>
  <!--form for updating a person-->
<form action="updatedperson.php" method="post">
<center>
  <h1>Update an existing person</h1>
  <p>Person Id:
  <input type="text" name="pid" size="30" value="" />
  </p>
  <p>New Last Name:
  <input type="text" name="lastname" size="30" value="" />
  </p>
  <p>New First Name:
  <input type="text" name="firstname" size="30" value="" />
  </p>
  <p>New Date of Birth:
  <input type="text" name="dob" size="30" value="" />
  </p>
  <p>New role:
  <input type="text" name="role" size="30" value="" />
  </p>
  <p>
  <input type="submit" name="submit" value="Send" />
  </p>
</center>
</form>
</body>
</html>
