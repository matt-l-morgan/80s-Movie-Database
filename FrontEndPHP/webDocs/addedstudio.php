<html>
<head>
<title>studio added</title>
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Mr+Dafoe'>

    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
if(isset($_POST['submit'])){

    $data_missing = array();

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

    //run query
    if(empty($data_missing)){

        require_once('../mysql_connect.php');

        $query = "INSERT INTO studio(sname, company, city, country)
        VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);

        mysqli_stmt_bind_param($stmt, "ssss", $name, $company, $city, $country);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'studio Entered';

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
<form action="addedstudio.php" method="post">
  <center>
    <h1>Add a New studio</h1>
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
  </form>
</html>
