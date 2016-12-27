<?php

	interface interfaceEncryption
	{
		public function hashSSHA($password);
		public function checkhashSSHA($salt, $password);
	}

?>