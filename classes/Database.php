<?php  

class Database{

	private static $INSTANCE = null;
	private $mysqli,
			$HOST = 'localhost',
			$USER = 'root',
			$PASS = '',
			$DBNAME = 'db_siakad';

	public function __construct()
	{
		$this->mysqli = new mysqli ( $this->HOST, $this->USER, $this->PASS, $this->DBNAME );
		if(mysqli_connect_error()){
			die('gagal koneksi');
		}
	}

/* 
	Singleton pattern 
	Menguji koneksi agar tidak double
*/
	public static function getInstance()
	{
		if(!isset(self::$INSTANCE)){
			self::$INSTANCE = new Database();
		}

		return self::$INSTANCE;
	}

	// Insert
	public function insert($table, $fields = array())
	{
		// Mengambil kolom
		$column = implode(", ", array_keys($fields));

		// Mengambil nilai
		$valueArray = array();
		$i = 0;
		foreach($fields as $key=>$values){
			if(is_int($values)){
				$valueArray[$i] = $this->escape($values);
			} else {
				$valueArray[$i] = "'".$this->escape($values)."'";
			}
			$i++;
		}
		$values = implode(", ", $valueArray);

		$query = "INSERT INTO $table ($column) VALUES ($values)";
		
		return $this->run_query($query);
	}

	public function get_info($table, $column = '', $value = '')
	{
		if(!is_int($value)) 
			$value = "'". $value ."'";

			if( $column != ''){
				$query = "SELECT * FROM $table WHERE $column = $value";
				$result = $this->mysqli->query($query);
				
				while ($row = $result->fetch_assoc()) {
					return $row;
				}
			} else {
				$query = "SELECT * FROM $table";
				$result = $this->mysqli->query($query);
				
				while ($row = $result->fetch_assoc()) {
					$results[] = $row;
				}

				return $results;
			}
	}

	// Update
	public function update($table, $fields, $id)
	{
		// Mengambil kolom
		$column = implode(", ", array_keys($fields));

		// Mengambil nilai
		$valueArray = array();
		$i = 0;
		foreach($fields as $key=>$values){
			if(is_int($values)){
				$valueArray[$i] = $key ."=". $this->escape($values);
			} else {
				$valueArray[$i] = $key ."=". "'".$this->escape($values)."'";
			}
			$i++;
		}
		$values = implode(", ", $valueArray);

		$query = "UPDATE $table SET $values WHERE id = $id";
		return $this->run_query($query);
	}

	// Delete
	public function delete($table, $column, $id)
	{
		$query = "DELETE FROM $table WHERE $column = $id";
		return $this->run_query($query);
	}
 
	// Run Query
	public function run_query($query)
	{
		if ($this->mysqli->query($query)) return true;
		else return false;
	}

	// Escape
	public function escape($name)
	{
		return $this->mysqli->real_escape_string($name);
	}

}


?>