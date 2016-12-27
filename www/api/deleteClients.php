<?php

	require_once('dependencies.php'); 

    
	$postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);

   
    $email = $request->email;
   
	 
	$dataUsers = array(
				new Delete($email)
	 	);

	$obj  = new DB_ConnectionString('root','','localhost','Interns');
    $obj2 = new DB_Connect($obj);

    $API  = new clientRegister($obj2,$dataUsers);
	$API->sendToRegisterAPI();

?>
