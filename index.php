<?php
require_once "models/Beer.php";
require_once "helpers/Database.php";

$db = new Database();
$conn = $db->getConnection();

?>
<html>
 <head>
  <title>Beer rating</title>
  <meta charset="utf-8"> 
</head>
<body>
<?php

?>
    <section>
	<h1>Najlepšie pivá</h1>
<?php

$stmt = $conn->query( "select Beer.id as id, title, IFNULL(avg(Rating.value), 0)  as rating from Beer left join Rating on Beer.id = Rating.beer_id group by Beer.id" );
$stmt->setFetchMode(PDO::FETCH_CLASS, "Beer");
$result = $stmt->fetchAll();

?>
	<ul id="beer-list">
	    <?php
		foreach($result as $beer){
    	    ?>
		
	    <li><?php echo "{$beer->getTitle()}: {$beer->getRating()}" ; ?></li>


	    <?php	    
		}
	    ?>
	</ul>
	<label for="beer-title">Názov piva:</label>
	<input id="beer-title" name="title">
	<button onclick="addBeer(document.getElementById('beer-title').value)">Pridaj</button>
    </section>
    <script src="js/script.js"></script>
</body>
</html>
