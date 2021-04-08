<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$usedcar = $model = $year = $message = $zipcode = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   // Get username & password
       $usedcar = trim($_POST["UsedCar"]);
       $model = trim($_POST["Model"]);  
       $year = trim($_POST["Year"]);
       $zipcode = trim($_POST["Zipcode"]); 
       
   // Prepare an insert statement
   $sql = "INSERT INTO p_usedcar (usedcar, model, year , zipcode) VALUES (?, ?, ?, ?)";
       
       // Use DB info in $link from config.php to construct MySQL message/command
       if($stmt = mysqli_prepare($link, $sql)){
 
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "ssss", $param_usedcar, $param_model, $param_year, $param_zipcode);
           
           // Set parameters
           $param_usedcar = $usedcar;
           $param_model = $model;
           $param_year = $year;
           $param_zipcode = $zipcode;
           
           // Attempt to EXECUTE the prepared statement
           mysqli_stmt_execute($stmt);            
 
           // Close statement
           mysqli_stmt_close($stmt);
           $message = "Congratulations! You have book an appointment for visit";
 
       } else {
                $message = "Problems with inserting to Database";            
       }
 
   // Close connection
   mysqli_close($link);
}
?>
 
<html>
<head>
   <title>Used Car</title>
</head>
<body>
 
<?php echo $message; ?>
 
</body>
</html>