<?php
 include "getdata.php";
 //initialize the variable
$error="";
//call function from database.php this access by getdata.php file
    $stmt=$formdata->login();
  
  if(!($stmt->rowCount()>0))
  {
    
    $error="Invalid username or password";
  }
  $output = array(
    'error'  =>  $error,
  
   );    
  echo json_encode($output);
?>
 
 

 