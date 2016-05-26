<?php
class Database
{   
    private $host = "localhost";
    private $db_name = "game_3d";
    private $username = "root";
    private $password = "root";
    public $connexion;
     
    public function dataConnection()
	{
     
	    $this->connexion = null;    
        try
		{
            $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->connexion;
    }
}
?>

<!--     private $host = "db622221789.db.1and1.com";
    private $db_name = "db622221789";
    private $username = "dbo622221789";
    private $password = "grimreaper2015";
    public $connexion; -->