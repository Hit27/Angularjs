<?php
include "getdata.php";
//initialize the variable 
$message="";
$error="";
$table='LoginDB';
 
//call function from database.php this access by getdata.php file
$stmt = $formdata->search();



// check if more than 0 record found
if($stmt->rowCount()>0)
{
    $error="User already exit...try another username";
}
else
{
   //call function from database.php this access by getdata.php file
    if($formdata->create())
    {
        $message = "Registration Completed";
    }
    else{
        $error="failed";
    }
}
    
//store data in $output
$output = array(
    'error'  =>  $error,
    'message' => $message
    );
        
    
echo json_encode( $output);




?>