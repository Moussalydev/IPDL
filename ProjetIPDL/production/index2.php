<?php
session_start();
?>
<html>
<head>
<title>Exemple MyArtiChow</title>
</head>
<body>
<a href="index.php">Version avec anti-alias</a>
<?php
// Permet de lancer un traitement lorsque toutes les images sont chargées...
$checkStatImagesOnAllComplete = 'alert("Toutes les images sont chargées !");';

// Include avec toutes mes fonctions qui vont bien...
include('artichow-1.1.0/statistiques_include.php');


/****************************************************** LES CAMEMBERTS *****************************************************/

/*********   EXEMPLE 1 (simple)   **********/

// Titre du camembert
$title = "EXEMPLE 1 (simple) :";

// Largeur du camembert
$width = 750;

// Hauteur du camembert
$height = 400;

// Tableau des légendes
$legend = array('Titi','Toto','Tata','Les autres');

// Tabeau des valeurs
$data = array(38,28,7,37);

// On crée l'image
insertStatImage(1,$width,$height,$title,$legend,$data,'','',FALSE);

echo'</br></br>';




/*********   EXEMPLE 2 (mise en forme des légendes)   **********/

// Titre du camembert
$title = "EXEMPLE 2 (mise en forme des légendes) :";

// Largeur du camembert
$width = 750;

// Hauteur du camembert
$height = 400;

// Tableau des légendes
$legend = array('ABCDEF','GHIJKL','MNOPQRS','TUVWXYZ');

// Tabeau des valeurs
$data = array(110,25,86,42);

// On met en forme les légendes
foreach($legend as $key => $value){
	if(strlen($value)>30){
		$lbl = substr($value,0,27).'...';
	}
	else{
		$lbl = str_pad($value,30,'.');
	}
	$legends[] = str_pad($lbl,35-strlen($data[$key]),'.').$data[$key];
	$datas[] = $data[$key];
}

// On crée l'image
insertStatImage(1,$width,$height,$title,$legends,$datas,'','',FALSE);

echo'</br></br>';




/*********   EXEMPLE 3 (tri par ordre décroissant)   **********/

// Titre du camembert
$title = "EXEMPLE 3 (tri par ordre décroissant) :";

// Largeur du camembert
$width = 750;

// Hauteur du camembert
$height = 400;

// Tableau des légendes
$legend = array('Titi','Toto','Tata','Les autres');

// Tabeau des valeurs
$data = array(16,25,2,34);

// Tri par ordre décroissant
array_multisort($data, SORT_DESC, $legend, SORT_ASC);

// On crée l'image
insertStatImage(1,$width,$height,$title,$legend,$data,'','',FALSE);

echo'</br></br>';





/*********   EXEMPLE 4 (couleurs personnalisées)   **********/

// Titre du camembert
$title = "EXEMPLE 4 (couleurs personnalisées) :";

// Largeur du camembert
$width = 750;

// Hauteur du camembert
$height = 400;

// Tableau des légendes
$legend = array('Titi','Toto','Tata','Les autres');

// Tabeau des valeurs
$data = array(16,25,2,34);

// Tabeau des couleurs
$color = array('#92DDF3','#5C69AA','#A35E9E','#DF6C6C');

// On met en forme les légendes
foreach($legend as $key => $value){
	if(strlen($value)>30){
		$lbl = substr($value,0,27).'...';
	}
	else{
		$lbl = str_pad($value,30,'.');
	}
	$legends2[] = str_pad($lbl,35-strlen($data[$key]),'.').$data[$key];
	$datas2[] = $data[$key];
	$colors2[] = $color[$key];
}

// Tri par ordre décroissant
array_multisort($datas2, SORT_DESC, $legends2, SORT_ASC, $colors2);

// On crée l'image
insertStatImage(1,$width,$height,$title,$legends2,$datas2,$colors2,'',FALSE);

echo'</br></br>';






/*********   EXEMPLE 5 (on passe une seule couleur et il s'occupe du dégradé)   **********/

// Titre du camembert
$title = "EXEMPLE 5 (dégradé de couleurs) :";

// Largeur du camembert
$width = 750;

// Hauteur du camembert
$height = 400;

// Tableau des légendes
$legend = array('Titi','Toto','Tata','Les autres');

// Tabeau des valeurs
$data = array(38,28,7,37);

// On met en forme les légendes
foreach($legend as $key => $value){
	if(strlen($value)>30){
		$lbl = substr($value,0,27).'...';
	}
	else{
		$lbl = str_pad($value,30,'.');
	}
	$legends3[] = str_pad($lbl,35-strlen($data[$key]),'.').$data[$key];
	$datas3[] = $data[$key];
}

// Tabeau des couleurs (on passe la couleur de base, il va créer un dégradé)
$color = array('#5C69AA');

// Tri par ordre décroissant
array_multisort($datas3, SORT_DESC, $legends3, SORT_ASC);

// On crée l'image
insertStatImage(1,$width,$height,$title,$legends3,$datas3,$color,'',FALSE);

echo'</br></br>';





/****************************************************** LES COURBES *****************************************************/


/*********   EXEMPLE 1 (Courbe simple...)   **********/

// Tableau des légendes
$legend = array('Titi','Toto');

// Tabeau des valeurs
$data2[] = array(5,11,10,8,12,0);
$data2[] = array(30,25,28,29,34,25);

// Tabeau des couleurs
$color2 = array('#5C69AA','#DF6C6C');

$title = " EXEMPLE 1 (Courbe simple...)";
$width = 750;
$height = 500;

insertStatImage(2,$width,$height,$title,$legend,$data2,$color2,'',FALSE);

echo'</br></br>';



/*********   EXEMPLE 2 (Des belles courbes...)   **********/

// Tableau des légendes
$legend = array('Titi','Toto','Tata','Les autres');
// Mise en forme des légendes
foreach($legend as $key => $value){
	if(strlen($value)>15){
		$lbl = substr($value,0,14).'.';
	}
	else{
		$lbl = str_pad($value, 15 , ' ');
	}
	$legend[$key] = $lbl;
}

// Tabeau des valeurs
$data3[] = array(0,9,8,0,5,15);
$data3[] = array(12,16,18,25,28,20);
$data3[] = array(5,11,10,8,12,0);
$data3[] = array(30,25,28,29,34,25);

// Tabeau des couleurs
$color3 = array('#92DDF3','#5C69AA','#A35E9E','#DF6C6C');

// Tableau des libelles de l'axe des abcisses
$lblAbs = array('01/2008','02/2008','03/2008','04/2008','05/2008','06/2008');

$title = " EXEMPLE 2 (Des belles courbes...)";
$width = 750;
$height = 500;

insertStatImage(2,$width,$height,$title,$legend,$data3,$color3,$lblAbs,FALSE);

echo'</br></br>';

?>
</body>
</html>
