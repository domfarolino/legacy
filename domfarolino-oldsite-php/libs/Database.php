<?php
class Database{
	
	private $dbtype = DB_TYPE;
	private $server = DB_HOST;
	private $dbname = DB_NAME;
	private $dbuser = DB_USER;
	private $dbpass = DB_PASS;

	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS){
		try{
			$this->db = new PDO($DB_TYPE.':host='.$DB_HOST.';dbname='.$DB_NAME, $DB_USER, $DB_PASS);
		} catch(PDOException $e){
			//error occured
		}
	}

	public function select($statement, $array = array(), $fetchmode = PDO::FETCH_ASSOC){
		$statement = $this->db->prepare($statement);
		if($statement->execute($array)){
			return $statement->fetchAll($fetchmode);	
		} else {
			return false;
		}
	}

	public function selectRowCount($statement, $array = array(), $fetchmode = PDO::FETCH_ASSOC){
		$statement = $this->db->prepare($statement);
		if($statement->execute($array)){
			return $statement->rowCount();
		} else {
			return false;
		}
	}

	public function insert($statement, $array){
		$statement = $this->db->prepare($statement);
		
		if($statement->execute($array)){
			return true;
		} else {
			return false;
		}
	}

	public function update($statement, $array){

	}

	public function delete($statement, $array){
		$statement = $this->db->prepare($statement);

		if($statement->execute($array)){
			return true;
		} else {
			return false;
		}
	}
}

?>