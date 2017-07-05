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
  SELECT * FROM film
  WHERE fid LIKE '%".$search."%'
  OR title LIKE '%".$search."%'
  OR yr LIKE '%".$search."%'
  OR genre LIKE '%".$search."%'
 ";
}
else
{
  //if there is nothing in the search bar, return everyting
 $query = "
  SELECT * FROM film ORDER BY title
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Film Id</th>
     <th>title</th>
     <th>Release Year</th>
     <th>Genre</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
   //jquery for the repsonsive results
  $output .= '
   <tr>
    <td>'.$row["fid"].'</td>
    <td>'.$row["title"].'</td>
    <td>'.$row["yr"].'</td>
    <td>'.$row["genre"].'</td>
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
