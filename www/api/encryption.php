<?php
	
	require_once('dependencies.php');

	class encryption implements interfaceEncryption
	{

		private $salt;
		private $encrypted;
		private $hash;
		private $checkHash;

		public function hashSSHA($password)
		{
			$this->salt = sha1(rand());
			$this->salt = substr($this->salt, 0,10);
			$this->encrypted = base64_encode(sha1( $password . $this->salt,true) . $this->salt);
			$this->hash = array("salt" => $this->salt , "encrypted" => $this->encrypted);

			return $this->hash;

		}

		public function checkhashSSHA($salt, $password)
		{
			$this->checkHash = base64_encode(sha1($password . $salt, true) . $salt);
			return $this->checkHash;
		}

	}
?>