<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "broteronews";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysqli_select_db($conn,$this->database);
	}
	
	function runQuery($query) {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
		$result = mysqli_query($conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$conn = $this->connectDB();
				if(!empty($conn)) {
			$this->selectDB($conn);
		}
		$result  = mysqli_query($conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>