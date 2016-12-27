<?php

	header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

    ##############################################################################
    ##############################################################################

	require_once('DataInterface.php');
	require_once('interfaceEncryption.php');
	require_once('interfaceLogin.php');
	require_once('interfaceRegister.php');
	require_once('interfaceCheckUserExist.php');
	require_once('interfaceDBConnect.php');
	require_once('interfaceConnectionString.php');
	require_once('interfaceRegisterBench.php');

	##############################################################################
    ##############################################################################

	require_once('Config.php');
	require_once('DB_Connect.php');
	require_once('DB_ConnectionString.php');
	require_once('MySQLConnection.php');
	require_once('encryption.php');
	require_once('Register.php');
	require_once('Login.php');
	require_once('Gateway.php');
	require_once('checkUserExist.php');
	require_once('deleteUser.php');
	require_once('callRegister.php');

	
	

	

?>