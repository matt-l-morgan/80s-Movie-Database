<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', '127.0.0.1');
DEFINE('DB_NAME', 'movieproj');
$connect = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' .
  mysqli_connect_error());

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 //statment for searching all the columns of each tuplet
 $query = "
  SELECT * FROM person
  WHERE pid LIKE '%".$search."%'
  OR lastname LIKE '%".$search."%'
  OR firstname LIKE '%".$search."%'
  OR dob LIKE '%".$search."%'
  OR role LIKE '%".$search."%'
 ";
}
else
{
  //if there is nothing in the search bar, return everyting
 $query = "
  SELECT * FROM person ORDER BY lastname
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Person Id</th>
     <th>last name</th>
     <th>first name</th>
     <th>Year of birth</th>
     <th>Role</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
   //jquery for the repsonsive results
  $output .= '
   <tr>
    <td>'.$row["pid"].'</td>
    <td>'.$row["lastname"].'</td>
    <td>'.$row["firstname"].'</td>
    <td>'.$row["dob"].'</td>
    <td>'.$row["role"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
