<?php

require_once "../Pie.class.php";

$graph = new Graph(400, 250);
$graph->setAntiAliasing(TRUE);

$graph->title->set("Pie (example 17)");
$graph->title->setFont(new Tuffy(14));

$values = array();
$plot->setLegend(array());


try {

    $db = new PDO ('mysql:host=localhost;dbname=statistiques','root','');
	
	} catch (Exception $e) {
	   die('Erreur :'.$e->getMessage());
	}

		$query=$db->query("SELECT Formation, count(civilite) as effectif FROM a GROUP BY Formation ");
		$tab=array();
		while ($rsult=$query->fetch()) {
			$plot[]=$rsult['Formation'];
			$values [] = $rsult['effectif'];
	}

$plot = new Pie($values, PIE_AQUA);
$plot->setCenter(0.4, 0.55);
$plot->setAbsSize(180, 180);


$explode = array();
for($i = 0; $i < count($values); $i++) {
	$explode[] = 15;
}

$plot->explode($explode);

$plot->legend->setPosition(1.5);
$plot->legend->shadow->setSize(0);

$graph->add($plot);
$graph->draw();

?>