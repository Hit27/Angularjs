<?php
//connect to  database
require '../Database/conection.php';
require '../Database/database.php';

// get database connection    
$conection = new conection();
$database = $conection->getConnection();
$formdata = new mydatabase($database);
//get post data from Html file
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
//assign value to $form_data 
$formdata->UserName=$request->username;
$formdata->password=$request->password;
?>