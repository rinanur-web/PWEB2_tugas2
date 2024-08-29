<?php
class Database {
    private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $database = "pweb2";
	protected $koneksi = "";

    function __construct()
	{
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}
}
/*class dtabase {
	private $host : "loc
}*/
?>

