<?php

	require_once('dependencies.php');

	class CheckExistingUsers implements interfaceCheckUserExist
	{

		
		private $connectionDatabase;
		private $MySQLConn;

		private $statement;
		private $result;
		private $countQueryResult;

		public function __construct(interfaceDBConnect $db_Connect)
		{

			$this->connectionDatabase = $db_Connect;

			$this->MySQLConn = $this->connectionDatabase->returnMySQLConnection();


		}

		public function isUserExisted($emails)
		{

			$this->statement = $this->MySQLConn->prepare("CALL SelectUserByEmail(?)");

			$this->statement->bind_param("s",$emails);

			if($this->statement->execute())
			{
				$this->result = $this->statement->get_result()->fetch_assoc();
				$this->countQueryResult = count($this->result);
				
				echo $this->countQueryResult . '<br>';

				if( $this->countQueryResult > 0 )
				{
					echo "user exist" . '<br>';
					echo json_encode($this->result["Username"]) ;
				}
				else
				{
					echo "No existing user";
				}
			}
		}
	}

?>