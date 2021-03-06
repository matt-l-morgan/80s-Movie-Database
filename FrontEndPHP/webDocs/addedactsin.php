<title>"Acts in" relationship added</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['personId'])){
        // Adds to array if data is missing
        $data_missing[] = 'personId';
    } else {
        //gets rid of whitespace
        $personId = trim($_POST['personId']);

    }

    if(empty($_POST['filmId'])){

        $data_missing[] = 'filmId';

    } else{
        $filmId = trim($_POST['filmId']);
    }

    //if all data is present, send the INSERT statment
    if(empty($data_missing)){

        require_once('../mysql_connect.php');

        $query = "INSERT INTO actsin(pid, fid)
        VALUES (?, ?)";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ii", $personId, $filmId);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'relationship entered';

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
<!--allow the user to add another relationship-->
<form action="addedmakes.php" method="post">
  <center>
    <h1>Add a "Acts in" relationship</h1>
    <p>Person ID:
    <input type="text" name="personId" size="30" value="" />
    </p>
    <p>Film ID:
    <input type="text" name="filmId" size="30" value="" />
    </p>
    <p>
    <input type="submit" name="submit" value="Send" />
    </p>
  </center>
  </form>
</html>
