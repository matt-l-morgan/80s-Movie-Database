<html>
<head>
<title>Studio Updated</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['sid'])){
        $data_missing[] = 'sid';
    } else {

        $sid = trim($_POST['sid']);

    }

    if(empty($_POST['name'])){
        $data_missing[] = 'name';
    } else {

        $name = trim($_POST['name']);

    }

    if(empty($_POST['company'])){

        $data_missing[] = 'company';

    } else{
        $company = trim($_POST['company']);
    }

    if(empty($_POST['city'])){

        $data_missing[] = 'city';

    } else{

        $city = trim($_POST['city']);

    }
    if(empty($_POST['country'])){

        $data_missing[] = 'country';

    } else{

        $country = trim($_POST['country']);

    }

    //UPDATE command for every scenario of input
    if(empty($data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE studio SET sname = ?, company = ?, city = ?, country = ? WHERE sid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ssssi", $name, $company, $city, $country, $sid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Studio Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

    } elseif (sizeof($data_missing) == 1 && in_array('name', $data_missing)){

      require_once('../mysql_connect.php');

      $query = "UPDATE studio SET company = ?, city = ?, country = ? WHERE sid = ?;";
      $stmt = mysqli_prepare($dbc, $query);

      mysqli_stmt_bind_param($stmt, "sssi", $company, $city, $country, $sid);

      mysqli_stmt_execute($stmt);

      $affected_rows = mysqli_stmt_affected_rows($stmt);

      if($affected_rows == 1){

          echo 'Studio Updated';

          mysqli_stmt_close($stmt);

          mysqli_close($dbc);

      } else {

          echo 'Error Occurred<br />';
          echo mysqli_error();

          mysqli_stmt_close($stmt);

          mysqli_close($dbc);
      }

      }
      elseif (sizeof($data_missing) == 1 && in_array('company', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE studio SET sname = ?, city = ?, country = ? WHERE sid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sssi", $name, $city, $country, $sid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Studio Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

        }
      elseif (sizeof($data_missing) == 1 && in_array('city', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE studio SET sname = ?, company = ?, country = ? WHERE sid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sssi", $name, $company, $country, $sid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Studio Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

      }
      elseif (sizeof($data_missing) == 1 && in_array('country', $data_missing)){

        require_once('../mysql_connect.php');

        $query = "UPDATE studio SET sname = ?, company = ?, city = ? WHERE sid = ?;";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "sssi", $name, $company, $city, $sid);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Studio Updated';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

      }
      elseif (sizeof($data_missing) == 2 && in_array('name', $data_missing)
              && in_array('company', $data_missing)){

              require_once('../mysql_connect.php');

              $query = "UPDATE studio SET city = ?, country = ? WHERE sid = ?;";
              $stmt = mysqli_prepare($dbc, $query);

              mysqli_stmt_bind_param($stmt, "ssi", $city, $country, $sid);

              mysqli_stmt_execute($stmt);

              $affected_rows = mysqli_stmt_affected_rows($stmt);

              if($affected_rows == 1){

                  echo 'Studio Updated';

                  mysqli_stmt_close($stmt);

                  mysqli_close($dbc);


        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);
        }

        }
        elseif (sizeof($data_missing) == 2 && in_array('name', $data_missing)
                && in_array('city', $data_missing)){

              require_once('../mysql_connect.php');

              $query = "UPDATE studio SET company = ?, country = ? WHERE sid = ?;";
              $stmt = mysqli_prepare($dbc, $query);

              mysqli_stmt_bind_param($stmt, "ssi", $company, $country, $sid);

              mysqli_stmt_execute($stmt);

              $affected_rows = mysqli_stmt_affected_rows($stmt);

              if($affected_rows == 1){

                  echo 'Studio Updated';

                  mysqli_stmt_close($stmt);

                  mysqli_close($dbc);


          } else {

              echo 'Error Occurred<br />';
              echo mysqli_error();

              mysqli_stmt_close($stmt);

              mysqli_close($dbc);
          }

          }
          elseif (sizeof($data_missing) == 2 && in_array('name', $data_missing)
                  && in_array('country', $data_missing)){

                  require_once('../mysql_connect.php');

                  $query = "UPDATE studio SET sname = ?, company = ?, city = ?, country = ? WHERE sid = ?;";
                  $stmt = mysqli_prepare($dbc, $query);

                  mysqli_stmt_bind_param($stmt, "ssi", $company, $city, $sid);

                  mysqli_stmt_execute($stmt);

                  $affected_rows = mysqli_stmt_affected_rows($stmt);

                  if($affected_rows == 1){

                      echo 'Studio Updated';

                      mysqli_stmt_close($stmt);

                      mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 2 && in_array('company', $data_missing)
                  && in_array('city', $data_missing)){

                  require_once('../mysql_connect.php');

                  $query = "UPDATE studio SET sname = ?, country = ? WHERE sid = ?;";
                  $stmt = mysqli_prepare($dbc, $query);

                  mysqli_stmt_bind_param($stmt, "ssi", $name, $country, $sid);

                  mysqli_stmt_execute($stmt);

                  $affected_rows = mysqli_stmt_affected_rows($stmt);

                  if($affected_rows == 1){

                      echo 'Studio Updated';

                      mysqli_stmt_close($stmt);

                      mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 2 && in_array('company', $data_missing)
                  && in_array('country', $data_missing)){

                  require_once('../mysql_connect.php');

                  $query = "UPDATE studio SET sname = ?, city = ? WHERE sid = ?;";
                  $stmt = mysqli_prepare($dbc, $query);

                  mysqli_stmt_bind_param($stmt, "ssi", $name, $city, $sid);

                  mysqli_stmt_execute($stmt);

                  $affected_rows = mysqli_stmt_affected_rows($stmt);

                  if($affected_rows == 1){

                      echo 'Studio Updated';

                      mysqli_stmt_close($stmt);

                      mysqli_close($dbc);
            }
          }
          elseif (sizeof($data_missing) == 2 && in_array('city', $data_missing)
                  && in_array('country', $data_missing)){

                    require_once('../mysql_connect.php');

                    $query = "UPDATE studio SET sname = ?, company = ? WHERE sid = ?;";
                    $stmt = mysqli_prepare($dbc, $query);

                    mysqli_stmt_bind_param($stmt, "ssi", $name, $company, $sid);

                    mysqli_stmt_execute($stmt);

                    $affected_rows = mysqli_stmt_affected_rows($stmt);

                    if($affected_rows == 1){

                        echo 'Studio Updated';

                        mysqli_stmt_close($stmt);

                        mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 3 && in_array('name', $data_missing)
                  && in_array('company', $data_missing) && in_array('city', $data_missing)){

                  require_once('../mysql_connect.php');

                  $query = "UPDATE studio SET country = ? WHERE sid = ?;";
                  $stmt = mysqli_prepare($dbc, $query);

                  mysqli_stmt_bind_param($stmt, "si", $country, $sid);

                  mysqli_stmt_execute($stmt);

                  $affected_rows = mysqli_stmt_affected_rows($stmt);

                  if($affected_rows == 1){

                      echo 'Studio Updated';

                      mysqli_stmt_close($stmt);

                      mysqli_close($dbc);

            }
          }
          elseif (sizeof($data_missing) == 3 && in_array('name', $data_missing)
                  && in_array('company', $data_missing) && in_array('country', $data_missing)){

                  require_once('../mysql_connect.php');

                  $query = "UPDATE studio SET city = ? WHERE sid = ?;";
                  $stmt = mysqli_prepare($dbc, $query);

                  mysqli_stmt_bind_param($stmt, "si", $city, $sid);

                  mysqli_stmt_execute($stmt);

                  $affected_rows = mysqli_stmt_affected_rows($stmt);

                  if($affected_rows == 1){

                      echo 'Studio Updated';

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
            elseif (sizeof($data_missing) == 3 && in_array('city', $data_missing)
                    && in_array('company', $data_missing) && in_array('country', $data_missing)){

                    require_once('../mysql_connect.php');

                    $query = "UPDATE studio SET sname = ? WHERE sid = ?;";
                    $stmt = mysqli_prepare($dbc, $query);

                    mysqli_stmt_bind_param($stmt, "si", $name, $sid);

                    mysqli_stmt_execute($stmt);

                    $affected_rows = mysqli_stmt_affected_rows($stmt);

                    if($affected_rows == 1){

                        echo 'Studio Updated';

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
              elseif (sizeof($data_missing) == 3 && in_array('city', $data_missing)
                      && in_array('name', $data_missing) && in_array('country', $data_missing)){

                        require_once('../mysql_connect.php');

                        $query = "UPDATE studio SET company = ? WHERE sid = ?;";
                        $stmt = mysqli_prepare($dbc, $query);

                        mysqli_stmt_bind_param($stmt, "si", $company, $sid);

                        mysqli_stmt_execute($stmt);

                        $affected_rows = mysqli_stmt_affected_rows($stmt);

                        if($affected_rows == 1){

                            echo 'Studio Updated';

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

        if (in_array('sid', $data_missing)){
            echo 'You need to enter a valid studio id<br />';
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

<form action="updatedstudio.php" method="post">
  <center>
    <h1>Update an existing studio</h1>
    <p>Studio Id:
    <input type="text" name="sid" size="30" value="" />
    </p>
    <p>Studio Name:
    <input type="text" name="name" size="30" value="" />
    </p>
    <p>Parent Company:
    <input type="text" name="company" size="30" value="" />
    </p>
    <p>City:
    <input type="text" name="city" size="30" value="" />
    </p>
    <p>Country:
    <input type="text" name="country" size="30" value="" />
    </p>
    <p>
    <input type="submit" name="submit" value="Send" />
    </p>
  </center>
</html>
