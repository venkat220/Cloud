<?php
/* Database credentials. */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'chinnapv1');
define('DB_PASSWORD', '36bywp');
define('DB_NAME', 'chinnapv1_db');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
   die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>