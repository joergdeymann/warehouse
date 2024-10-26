<?php
class Musterlager extends Database {
	public $db;
	public $row;
	public $result;
	
	function __construct(&$db) {
		$this->db=$db;
		$this->table="ls24_musterlager";

	}

	function load() {
		$request ="SELECT * from ls24_musterlager";
		$request.=" right join ls24_artikel";
		$request.=" on ls24_musterlager.artikelnr = ls24_artikel.nr";
		$request.=" order by hersteller,model,realname";
		$result=$this->db->query($request);
		$this->result=$result;
		return $result;
	}	
	
	function next() {
echo "Next<br>";		
		$this->row=$this->result->fetch_assoc();
var_dump($this->row);
		return $this->row;
	}
}

?>
