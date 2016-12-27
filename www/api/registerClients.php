<?php

	require_once('dependencies.php'); 


	$postdata = file_get_contents("php://input");
    $request  = json_decode($postdata);
 

    $username = $request->username;
    $email    = $request->email;
    $pass     = $request->password;



	 $obj  = new DB_ConnectionString('root','','localhost','bench');	//need to create a special file for this instance
     $obj2 = new DB_Connect($obj);

     $dataUsers = array (
				new callClientRegister($obj2,$username,$email,$pass)
	 	);

     $API  = new clientRegister($obj2,$dataUsers);
	 $API->sendToRegisterAPI();

?>
