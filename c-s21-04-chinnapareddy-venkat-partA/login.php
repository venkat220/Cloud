<?php
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$model = $message = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
       $model = trim($_POST["Model"]);
 
   // Validate credentials
 
       // Prepare a select statement
       $sql = "SELECT id, usedcar, model, year, zipcode FROM p_usedcar WHERE model = ?";
       
       if($stmt = mysqli_prepare($link, $sql)){
           // Bind variables to the prepared statement as parameters
           mysqli_stmt_bind_param($stmt, "s", $param_model);
           
           // Set parameters
           $param_model = $model;
           
           // Attempt to execute the prepared statement
           if(mysqli_stmt_execute($stmt)){
               // Store result
               mysqli_stmt_store_result($stmt);
               
               // Check if username exists, if yes then verify password
               if(mysqli_stmt_num_rows($stmt) == 1){                    
                   // Bind result variables
                   mysqli_stmt_bind_result($stmt, $id, $usedcar, $model, $year, $zipcode);
                   if(mysqli_stmt_fetch($stmt)){
                           // Password is correct Display a message that it's OK
                           $message = "Congratulations!! The Usedcar you are searching " . $usedcar ." model ". $model ;
 
                   }
               } else{
                   // Display an error message if username doesn't exist
                   $message = "No car found with that model.";
               }          
           }
 
           // Close statement
           mysqli_stmt_close($stmt);
       }
   
   // Close connection
   mysqli_close($link);
}
?>
 
<html>
<head>
   <title>Login</title>
</head>
<body>
 
<?php echo $message; ?>
 
</body>
</html>