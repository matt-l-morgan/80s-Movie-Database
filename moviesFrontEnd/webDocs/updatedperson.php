<html>
<head>
<title>Person Updated</title>
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

    if(empty($_POST['lastname'])){
        $data_missing[] = 'lastname';
    } else {

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

    //UPDATE command for every scenario of input
    if(empty($data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE person SET lastname = ?, firstname = ?, dob = ?, role = ? WHERE pid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ssisi", $lastname, $firstname, $dob, $role, $pid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Person Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

    } elseif (sizeof($data_missing) == 1 && in_array('lastname', $data_missing)){

      require_once('../mysql_connect.php');

      $query = "UPDATE person SET firstname = ?, dob = ?, role = ? WHERE pid = ?;";
      $stmt = mysqli_prepare($dbc, $query);

      mysqli_stmt_bind_param($stmt, "sisi", $firstname, $dob, $role, $pid);

      mysqli_stmt_execute($stmt);

      $affected_rows = mysqli_stmt_affected_rows($stmt);

      if($affected_rows == 1){

          echo 'Person Updated';

          mysqli_stmt_close($stmt);

          mysqli_close($dbc);

      } else {

          echo 'Error Occurred<br />';
          echo mysqli_error();

          mysqli_stmt_close($stmt);

          mysqli_close($dbc);
      }

      }
      elseif (sizeof($data_missing) == 1 && in_array('firstname', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE person SET lastname = ?, dob = ?, role = ? WHERE pid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sisi", $lastname, $dob, $role, $pid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Person Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

        }
      elseif (sizeof($data_missing) == 1 && in_array('dob', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE person SET lastname = ?, firstname = ?, role = ? WHERE pid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sssi", $lastname, $firstname, $role, $pid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Person Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

      }
      elseif (sizeof($data_missing) == 1 && in_array('role', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE person SET lastname = ?, firstname = ?, dob = ? WHERE pid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ssii", $lastname, $firstname, $dob, $pid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Person Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

      }
      elseif (sizeof($data_missing) == 2 && in_array('lastname', $data_missing)
              && in_array('firstname', $data_missing)){

            require_once('../mysql_connect.php');

            $query = "UPDATE person SET dob = ?, role = ? WHERE pid = ?;";
            $stmt = mysqli_prepare($dbc, $query);

            mysqli_stmt_bind_param($stmt, "isi", $dob, $role, $pid);

            mysqli_stmt_execute($stmt);

            $affected_rows = mysqli_stmt_affected_rows($stmt);

            if($affected_rows == 1){

                echo 'Person Updated';

                mysqli_stmt_close($stmt);

                mysqli_close($dbc);


        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

        }
        elseif (sizeof($data_missing) == 2 && in_array('lastname', $data_missing)
                && in_array('dob', $data_missing)){

            require_once('../mysql_connect.php');

            $query = "UPDATE person SET firstname = ?, role = ? WHERE pid = ?;";
            $stmt = mysqli_prepare($dbc, $query);

            mysqli_stmt_bind_param($stmt, "ssi", $firstname, $role, $pid);

            mysqli_stmt_execute($stmt);

            $affected_rows = mysqli_stmt_affected_rows($stmt);

            if($affected_rows == 1){

                echo 'Person Updated';

                mysqli_stmt_close($stmt);

                mysqli_close($dbc);


          } else {

              echo 'Error Occurred<br />';
              echo mysqli_error();

              mysqli_stmt_close($stmt);

              mysqli_close($dbc);
          }

          }
          elseif (sizeof($data_missing) == 2 && in_array('lastname', $data_missing)
                  && in_array('role', $data_missing)){

                require_once('../mysql_connect.php');

                $query = "UPDATE person SET firstname = ?, dob = ? WHERE pid = ?;";
                $stmt = mysqli_prepare($dbc, $query);

                mysqli_stmt_bind_param($stmt, "sii", $firstname, $dob, $pid);

                mysqli_stmt_execute($stmt);

                $affected_rows = mysqli_stmt_affected_rows($stmt);

                if($affected_rows == 1){

                    echo 'Person Updated';

                    mysqli_stmt_close($stmt);

                    mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 2 && in_array('firstname', $data_missing)
                  && in_array('dob', $data_missing)){

                require_once('../mysql_connect.php');

                $query = "UPDATE person SET lastname = ?, role = ? WHERE pid = ?;";
                $stmt = mysqli_prepare($dbc, $query);

                mysqli_stmt_bind_param($stmt, "ssi", $lastname, $role, $pid);

                mysqli_stmt_execute($stmt);

                $affected_rows = mysqli_stmt_affected_rows($stmt);

                if($affected_rows == 1){

                    echo 'Person Updated';

                    mysqli_stmt_close($stmt);

                    mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 2 && in_array('firstname', $data_missing)
                  && in_array('role', $data_missing)){

                require_once('../mysql_connect.php');

                $query = "UPDATE person SET lastname = ?, dob = ? WHERE pid = ?;";
                $stmt = mysqli_prepare($dbc, $query);

                mysqli_stmt_bind_param($stmt, "sii", $lastname, $dob, $pid);

                mysqli_stmt_execute($stmt);

                $affected_rows = mysqli_stmt_affected_rows($stmt);

                if($affected_rows == 1){

                    echo 'Person Updated';

                    mysqli_stmt_close($stmt);

                    mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 2 && in_array('dob', $data_missing)
                  && in_array('role', $data_missing)){

                require_once('../mysql_connect.php');

                $query = "UPDATE person SET lastname = ?, firstname = ? WHERE pid = ?;";
                $stmt = mysqli_prepare($dbc, $query);

                mysqli_stmt_bind_param($stmt, "ssi", $lastname, $firstname, $pid);

                mysqli_stmt_execute($stmt);

                $affected_rows = mysqli_stmt_affected_rows($stmt);

                if($affected_rows == 1){

                    echo 'Person Updated';

                    mysqli_stmt_close($stmt);

                    mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 3 && in_array('lastname', $data_missing)
                  && in_array('firstname', $data_missing) && in_array('dob', $data_missing)){

                require_once('../mysql_connect.php');

                $query = "UPDATE person SET role = ? WHERE pid = ?;";
                $stmt = mysqli_prepare($dbc, $query);

                mysqli_stmt_bind_param($stmt, "si", $role, $pid);

                mysqli_stmt_execute($stmt);

                $affected_rows = mysqli_stmt_affected_rows($stmt);

                if($affected_rows == 1){

                    echo 'Person Updated';

                    mysqli_stmt_close($stmt);

                    mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 3 && in_array('lastname', $data_missing)
                  && in_array('firstname', $data_missing) && in_array('role', $data_missing)){

                require_once('../mysql_connect.php');

                $query = "UPDATE person SET dob = ? WHERE pid = ?;";
                $stmt = mysqli_prepare($dbc, $query);

                mysqli_stmt_bind_param($stmt, "ii", $dob, $pid);

                mysqli_stmt_execute($stmt);

                $affected_rows = mysqli_stmt_affected_rows($stmt);

                if($affected_rows == 1){

                    echo 'Person Updated';

                    mysqli_stmt_close($stmt);

                    mysqli_close($dbc);

            }
            else {

                echo 'Error Occurred<br />';
                echo mysqli_error();

                mysqli_stmt_close($stmt);

                mysqli_close($dbc);
            }

            }
            elseif (sizeof($data_missing) == 3 && in_array('dob', $data_missing)
                    && in_array('firstname', $data_missing) && in_array('role', $data_missing)){

                  require_once('../mysql_connect.php');

                  $query = "UPDATE person SET lastname = ? WHERE pid = ?;";
                  $stmt = mysqli_prepare($dbc, $query);

                  mysqli_stmt_bind_param($stmt, "si", $lastname, $pid);

                  mysqli_stmt_execute($stmt);

                  $affected_rows = mysqli_stmt_affected_rows($stmt);

                  if($affected_rows == 1){

                      echo 'Person Updated';

                      mysqli_stmt_close($stmt);

                      mysqli_close($dbc);

              }
              else {

                  echo 'Error Occurred<br />';
                  echo mysqli_error();

                  mysqli_stmt_close($stmt);

                  mysqli_close($dbc);
              }

              }
              elseif (sizeof($data_missing) == 3 && in_array('dob', $data_missing)
                      && in_array('lastname', $data_missing) && in_array('role', $data_missing)){

                    require_once('../mysql_connect.php');

                    $query = "UPDATE person SET firstname = ? WHERE pid = ?;";
                    $stmt = mysqli_prepare($dbc, $query);

                    mysqli_stmt_bind_param($stmt, "si", $firstname, $pid);

                    mysqli_stmt_execute($stmt);

                    $affected_rows = mysqli_stmt_affected_rows($stmt);

                    if($affected_rows == 1){

                        echo 'Person Updated';

                        mysqli_stmt_close($stmt);

                        mysqli_close($dbc);

                }
                else {

                    echo 'Error Occurred<br />';
                    echo mysqli_error();

                    mysqli_stmt_close($stmt);

                    mysqli_close($dbc);
                }

                }

    else {

        if (in_array('pid', $data_missing)){
            echo 'You need to enter a valid person id<br />';
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
</html>
