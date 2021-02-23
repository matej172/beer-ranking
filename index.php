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

  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<body>
<?php

?>
    <section>
	<h1>Najlepšie pivá</h1>
<?php

$stmt = $conn->query( "select title, IFNULL(avg(Rating.value), 0)  as rating from Beer left join Rating on Beer.id = Rating.beer_id group by Beer.id" );
$stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Beer");
$result = $stmt->fetchAll();
?>
	<ul>
	    <?php
		foreach($result as $beer){
    	    ?>
		
	    <li><?php echo "{$beer->getTitle()}: {$beer->getRating()}" ; ?></li>

	    <?php	    
		}
	    ?>
	</ul>
    </section>
</body>
</html>
