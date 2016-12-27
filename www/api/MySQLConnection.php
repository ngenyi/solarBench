<?php

	 class MySQLConnection extends Config
	{
		private $username;
		private $password;
		private $server;
		private $db;


		public function MySQLConnectionParameters($username,$password,$server,$db)
		{
			$this->username = $username;
			$this->password = $password;
			$this->server = $server;
			$this->db = $db;
			
			$data = (object) [						
    							'username' => $this->username,
   								'password' => $this->password,
   								'server'   => $this->server ,
   								'database' => $this->db

   								];


   			return json_encode($data);

		}


	}

?>