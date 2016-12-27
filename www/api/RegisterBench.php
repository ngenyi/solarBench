<?php
	
	require_once('dependencies.php');

	class RegisterBench implements interfaceRegisterBench
	{
		
		private $bench_num;
		private $location;
		private $bench_user_id;
		private $date_arrive;
		private $time_arrive;



		public function __construct($bench_num,$location,$bench_user_id,$date_arrive,$time_arrive)
		{

			$this->bench_num = $bench_num;
			$this->location = $location;
			$this->bench_user_id = $bench_user_id;
			$this->date_arrive = $date_arrive;
			$this->time_arrive = $time_arrive;
		}


		public function __destruct()
		{
			$this->bench_num = null;
			$this->location = null;
			$this->bench_user_id = null;
			$this->date_arrive = null;
			$this->time_arrive = null;
		}

		public function storeBenchInfo($callToClientRegister)
		{

		}
	}

?>