<?php
//set constants for the DB server.
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'root');
DEFINE('DB_HOST', '127.0.0.1');
DEFINE('DB_NAME', 'movieproj');
//connect to the db server.
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL ' .
  mysqli_connect_error());

 ?>
