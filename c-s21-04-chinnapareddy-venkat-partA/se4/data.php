<?php

function get_price($usedcar, $model)
{
        /* Database INFO */
	$servername = "localhost";
	$username = "chinnapv1";
	$password = "36bywp";
	$dbname = "chinnapv1_db";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
       }

       $sql = "SELECT model FROM p_usedcars WHERE usedcar = '$usedcar'";
       $result = $conn->query($sql);

        if ($result->num_rows > 0) {
             // output data of each row
             while($row = $result->fetch_assoc()) {
                      $p = $row["model"];
      }
    } else {
                     $p = null;
        }

    $conn->close();

if ($p == $model) 
  {
    return "true";
  }
else 
 {
  return "false";

 }

}

?>
