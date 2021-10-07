<?php
	class Databases
	{
		public $host = 'localhost';
		public $username = 'root';
		public $pass = '';
		public $dbname = 'customers';
		public function __construct()
		{
			$conn = mysqli_connect($this->host,$this->username,$this->pass,$this->dbname);
			if(!$conn)
			{
				echo "Failed";
			}
			else
			{
				return $conn;
			}
		}
		
	}
	
?>