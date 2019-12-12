<?php
/*
 * This work is hereby released into the Public Domain.
 * To view a copy of the public domain dedication,
 * visit http://creativecommons.org/licenses/publicdomain/ or send a letter to
 * Creative Commons, 559 Nathan Abbott Way, Stanford, California 94305, USA.
 *
 */
require_once ("Pie.class.php");


$graph = new Graph(400, 250);
$graph->setAntiAliasing(TRUE);

$graph->title->set("Pie (example 3)");


try {

    $db = new PDO ('mysql:host=localhost;dbname=statistiques','root','');
	
	} catch (Exception $e) {
	   die('Erreur :'.$e->getMessage());
	}

		$query=$db->query("SELECT Formation, count(civilite) as effectif FROM a GROUP BY Formation ");
		$tab=array();
		while ($rsult=$query->fetch()) {
			//$plot[]=$rsult['Formation'];
			$values [] = $rsult['effectif'];
	}

//$values = array(8, 4, 6, 2, 5, 3, 4);



//$plot->setLegend(array());

		$query=$db->query("SELECT Formation From a ");
		$tab=array();
		while ($rsult=$query->fetch()) {
			$plot[]=$rsult['Formation'];
			//$values [] = $rsult['effectif'];
	}

	$plot = new Pie($values, PIE_AQUA);
$plot->setCenter(0.4, 0.55);
$plot->setSize(0.7, 0.6);
$plot->set3D(15);
$plot->explode(array(4 => 20, 0 => 30));

$plot->legend->setPosition(1.3);
$plot->legend->setBackgroundColor(new VeryLightGray(30));

$graph->add($plot);
$graph->draw();

?>