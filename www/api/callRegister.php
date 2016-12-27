<?php

	require_once('dependencies.php');

	class callClientRegister implements DataInterface
	{


		private $username;
		private $email;
		private $password;

		private $user;
		private $response;
		private $instanceRegister;

		private $callClientRegister;


		private $instanceUserExist;

		public function __construct(interfaceDBConnect $db_Connect,$username,$email,$password)
		{

			$this->username = $username;
			$this->email 	= $email;
			$this->password = $password;

			$this->response = array("error" => FALSE);

			$this->instanceUserExist = new CheckExistingUsers($db_Connect);
			$this->instanceRegister = new Register($username,$email,$password);

			
		}

		public function PlugginAPI($MySQLConnection)
		{
			$this->callClientRegister = $MySQLConnection;

			if($this->instanceUserExist->isUserExisted($this->email))
			{

				//user already existed
				$this->response["error"] = TRUE;
				$this->response["error_msg"] = "User already existed with " . $this->email;
				echo json_encode($this->response);

			}
			else
			{
				//create a new user
				$this->user = $this->instanceRegister->storeUser($this->callClientRegister);



				if($this->user)
				{
					$this->response["error"] = FALSE;
					$this->response["user"]["name"] = $this->user["name"];
					$this->response["user"]["email"] = $this->user["email"];

					echo json_encode($this->response);
				}
				else
				{

					//user failed to store
					$this->response["error"] = TRUE;
					$this->response["error_msg"] = "Unknown error occured in registration!";
					
					echo json_encode($this->response);
				}

			}

		}
	}
?>

