<?php

	require_once('dependencies.php');

	class DB_Connect implements interfaceDBConnect
	{
		private $databaseConnect;

		public function __construct(interfaceConnectionString $databaseConnect)
		{
			$this->databaseConnect = $databaseConnect;
		}

		public function returnMySQLConnection()
		{
			return $this->databaseConnect->ConnectionString();
		}
	}


?>