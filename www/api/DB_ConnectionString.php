<?php
	
	require_once('dependencies.php');

	class DB_ConnectionString implements interfaceConnectionString
	{

		private $instanceMySQLConnection;
		private $instanceOfDB;

		public function __construct($username,$password,$host,$db)
		{

			$instanceOfDB = new MySQLConnection();
			$this->instanceMySQLConnection = $instanceOfDB->MySQLConnectionParameters($username,$password,$host,$db);


		}

		public function ConnectionString()
		{

			$result = json_decode($this->instanceMySQLConnection);


			$this->instanceOfDB = mysqli_connect($result->server , $result->username , $result->password, $result->database);

			####################################
			######## check connection ##########
			####################################

			if (mysqli_connect_errno()) 
			{
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}

			########################################
			####### check if server is alive #######
			########################################

			if (mysqli_ping($this->instanceOfDB )) 
			{
			   // printf ("Our connection is ok!\n");
			    return $this->instanceOfDB;
			} 
			else 
			{
			    printf ("Error: %s\n", mysqli_error($link));
			}

			#############################
			###### close connection #####
			#############################

			mysqli_close($this->instanceOfDB);


		}
	}

?>