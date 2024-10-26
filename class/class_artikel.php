<?php
class Artikel extends Database {
	public $db;
	public $row;
	public $result;
	
	function __construct(&$db) {
		$this->db=$db;
		$this->table="ls24_artikel";
	}

	function load() {
		$request ="SELECT * from ls24_artikel";
		$request.=" order by hersteller,model,name";
		$result=$this->db->query($request);
		$this->result=$result;
		return $result;
	}	
	
	function next() {
		$this->row=$this->result->fetch_assoc();
		return $this->row;
	}
}

?>
