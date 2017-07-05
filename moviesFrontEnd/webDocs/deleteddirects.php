<html>
<head>
<title>"directs" relationship deleted</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['pid'])){
        $data_missing[] = 'pid';
    } else {

        $pid = trim($_POST['pid']);

    }

    if(empty($_POST['fid'])){
        $data_missing[] = 'fid';
    } else {

        $fid = trim($_POST['fid']);

    }


    if(empty($data_missing)){

        require_once('../mysql_connect.php');

        $query = "DELETE FROM directs WHERE pid=? AND fid=?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ii", $pid, $fid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'relationship Deleted';

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

<form action="deleteddirects.php" method="post">
  <center>
    <h1>Delete a "directs" relationship</h1>
    <p>Person ID:
    <input type="text" name="pid" size="30" value="" />
    <p>Film ID:
    <input type="text" name="fid" size="30" value="" />
    <input type="submit" name="submit" value="Send" />
  </center>
</html>
