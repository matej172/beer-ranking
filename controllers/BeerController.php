<?php

require_once "models/Beer.php";
require_once "helpers/Database.php";

class BeerController {

    private $conn;

    public function __construct()
    {
	$db = new Database();
	$this->conn = $db->getConnection();
    }

    public function list() {
	
	$stmt = $this->conn->query( "select Beer.id as id, title, IFNULL(avg(Rating.value), 0)  as rating from Beer left join Rating on Beer.id = Rating.beer_id group by Beer.id" );
	$stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
	return $stmt->fetchAll();
    }

    public function addBeer($title){
	$stmt = $this->conn->prepare('INSERT INTO Beer (title) VALUES(:title)');
	$stmt->bindParam(':title', $title);
	$stmt->execute();
    }

    public function addRating(int $beerId, int $value){
	$stmt = $this->conn->prepare('INSERT INTO Rating (beer_id, value) VALUES(:beer_id, :value)');
	$stmt->bindValue(':beer_id',  $beerId, PDO::PARAM_INT);
	$stmt->bindValue(':value', $value, PDO::PARAM_INT);
	$stmt->execute();
    }
}
