<?php 
    class Database {
        private $host = "beer_db_1"; //change to localhost
        private $database_name = "myDb";
        private $username = "user"; //change to your mysql username
        private $password = "test"; //change to your mysql password

        public $conn;

        public function getConnection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Database could not be connected: " . $exception->getMessage();
            }
            return $this->conn;
        }
    }  
?>
