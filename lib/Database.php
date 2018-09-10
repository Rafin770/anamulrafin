<?php

if (class_exists('Database') != true) 
{

	class Database 
	{
		private $hostdb = "localhost:3306";
		private $userdb = "anamulra_anamulrafin";
		private $passdb = "AnamulRafin12345";
		private $namedb = "anamulra_automobile_sales_system";
		public $pdo;

		public function __construct() {
			if (!isset($this->pdo)) {
				try {
					$link = new PDO("mysql:host=".$this->hostdb.";dbname=".$this->namedb, $this->userdb, $this->passdb);
					$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$link->exec("SET CHARACTER SET utf8");
					$this->pdo = $link;
				} catch (PDOException $e) {
					die("Failed to connect with Database".$e->getMessage());
				}
			}


		}

	}

}

?>