<html>
<head>
<title>Film Updated</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['fid'])){
        $data_missing[] = 'fid';
    } else {

        $fid = trim($_POST['fid']);

    }

    if(empty($_POST['title'])){
        $data_missing[] = 'title';
    } else {

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

    //UPDATE command for every scenario of input
    if(empty($data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE film SET yr = ?, title = ?, genre = ? WHERE fid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "issi", $year, $title, $genre, $fid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'film Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

    } elseif (sizeof($data_missing) == 1 && in_array('year', $data_missing)){

      require_once('../mysql_connect.php');

      $query = "UPDATE film SET title = ?, genre = ? WHERE fid = ?;";
      $stmt = mysqli_prepare($dbc, $query);

      mysqli_stmt_bind_param($stmt, "ssi", $title, $genre, $fid);

      mysqli_stmt_execute($stmt);

      $affected_rows = mysqli_stmt_affected_rows($stmt);

      if($affected_rows == 1){

          echo 'film Updated';

          mysqli_stmt_close($stmt);

          mysqli_close($dbc);

      } else {

          echo 'Error Occurred<br />';
          echo mysqli_error();

          mysqli_stmt_close($stmt);

          mysqli_close($dbc);
      }

      }
      elseif (sizeof($data_missing) == 1 && in_array('title', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE film SET yr = ?, genre = ? WHERE fid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "isi", $year, $genre, $fid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'film Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

        }
      elseif (sizeof($data_missing) == 1 && in_array('genre', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE film SET title = ?, yr = ? WHERE fid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sii", $title, $year, $fid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'film Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

      }
      elseif (sizeof($data_missing) == 2 && in_array('year', $data_missing)
              && in_array('title', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE film SET genre = ? WHERE fid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "si", $genre, $fid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'film Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

        }
        elseif (sizeof($data_missing) == 2 && in_array('genre', $data_missing)
                && in_array('title', $data_missing)){

          require_once('../mysql_connect.php');

          $query = "UPDATE film SET yr = ? WHERE fid = ?;";
          $stmt = mysqli_prepare($dbc, $query);

          mysqli_stmt_bind_param($stmt, "ii", $year, $fid);

          mysqli_stmt_execute($stmt);

          $affected_rows = mysqli_stmt_affected_rows($stmt);

          if($affected_rows == 1){

              echo 'film Updated';

              mysqli_stmt_close($stmt);

              mysqli_close($dbc);

          } else {

              echo 'Error Occurred<br />';
              echo mysqli_error();

              mysqli_stmt_close($stmt);

              mysqli_close($dbc);
          }

          }
          elseif (sizeof($data_missing) == 2 && in_array('year', $data_missing)
                  && in_array('genre', $data_missing)){

            require_once('../mysql_connect.php');

            $query = "UPDATE film SET title = ? WHERE fid = ?;";
            $stmt = mysqli_prepare($dbc, $query);

            mysqli_stmt_bind_param($stmt, "si", $title, $fid);

            mysqli_stmt_execute($stmt);

            $affected_rows = mysqli_stmt_affected_rows($stmt);

            if($affected_rows == 1){

                echo 'film Updated';

                mysqli_stmt_close($stmt);

                mysqli_close($dbc);

            } else {

                echo 'Error Occurred<br />';
                echo mysqli_error();

                mysqli_stmt_close($stmt);

                mysqli_close($dbc);
            }

            }
    else {

        if (in_array('fid', $data_missing)){
            echo 'You need to enter a valid film id<br />';
        }
        else {
          echo 'You need to enter atleast on of the the following fields<br />';

          foreach($data_missing as $missing){

              echo "$missing<br />";
        }
        }

    }

}

?>

<form action="updatedfilm.php" method="post">
  <center>
    <h1>Update another existing film</h1>
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
</html>
