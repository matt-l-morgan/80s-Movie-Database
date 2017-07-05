<html>
<head>
<title>film added</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['title'])){
        // Adds to array if data is missing
        $data_missing[] = 'title';
    } else {

        //gets rid of whitespace
        $title = trim($_POST['title']);

    }

    if(empty($_POST['year'])){

        $data_missing[] = 'year';

    } else{

        $year = trim($_POST['year']);
    }

    if(empty($_POST['genre'])){

        $data_missing[] = 'genre';

    } else{

        $genre = trim($_POST['genre']);

    }

    //run the INSERT command
    if(empty($data_missing)){

        require_once('../mysql_connect.php');

        $query = "INSERT INTO film(title, yr, genre) VALUES (?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sis", $title, $year, $genre);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'film Entered';

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
<form action="addedfilm.php" method="post">
  <center>
    <h1>Add a New film</h1>
    <p>Title:
    <input type="text" name="title" size="30" value="" />
    </p>
    <p>Year:
    <input type="text" name="year" size="30" value="" />
    </p>
    <p>genre:
    <input type="text" name="genre" size="30" value="" />
    </p>
    <p>
    <input type="submit" name="submit" value="Send" />
    </p>
  </center>
</html>
