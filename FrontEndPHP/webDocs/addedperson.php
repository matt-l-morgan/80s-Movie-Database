<html>
<head>
<title>person added</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['lastname'])){
        // Adds to array if data is missing
        $data_missing[] = 'lastname';
    } else {

        // gets rid of whitespace
        $lastname = trim($_POST['lastname']);

    }

    if(empty($_POST['firstname'])){

        $data_missing[] = 'firstname';

    } else{

        $firstname = trim($_POST['firstname']);
    }

    if(empty($_POST['dob'])){

        $data_missing[] = 'dob';

    } else{

        $dob = trim($_POST['dob']);

    }
    if(empty($_POST['role'])){

        $data_missing[] = 'role';

    } else{

        $role = trim($_POST['role']);

    }


    if(empty($data_missing)){

        require_once('../mysql_connect.php');

        $query = "INSERT INTO person(lastname, firstname, dob, role)
        VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ssis", $lastname, $firstname, $dob, $role);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'person Entered';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>
<!--allow for another entry-->
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
</html>
