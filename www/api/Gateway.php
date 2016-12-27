<?php

	
	require_once('dependencies.php');

	class clientRegister 
	{

		private $data;

		private $connectionDatabase;
		private $MySQLConn;

		public function __construct(interfaceDBConnect $db_Connect , $data = array())
		{
			$this->data = $data;

			$this->connectionDatabase = $db_Connect;

			$this->MySQLConn = $this->connectionDatabase->returnMySQLConnection();

		}

		public function sendToRegisterAPI()
		{
			foreach($this->data as $data)
			{
				if(is_a($data,'DataInterface'))
				{
					//pass the data(array) to API then continue
					$dataAPI[] = $data->PlugginAPI($this->MySQLConn);
					continue;
				}

				throw new clientRegisterInvalidDataInterface;
			}

			//return the result
			return array($dataAPI);
		}
	}

?>