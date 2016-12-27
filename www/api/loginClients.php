<?php

	require_once('dependencies.php'); 


	$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    
    $email = $request->email;
    $pass = $request->password;


	 
	 $dataUsers = array(
				new Login( $email,$pass)
	 	);

	 $obj = new DB_ConnectionString('root','','localhost','bench');
     $obj2 = new DB_Connect($obj);

     $API = new clientRegister($obj2,$dataUsers);
	 return $API->sendToRegisterAPI();

?>