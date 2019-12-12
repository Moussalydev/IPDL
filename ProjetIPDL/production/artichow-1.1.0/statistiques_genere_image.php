<?php
@session_start();

/* Génère l'image des stats selon le type demandé */
$imageType = round($_GET['imageType']);

switch($imageType){

	case 1:
		// Camembert avec explode sur la valeur max
		require_once ("Pie.class.php");
		
		// Récupère les paramètres
		$imageID = round($_GET['imageID']);
		$width = round($_GET['width']);
		$height = round($_GET['height']);
		$antiAlias = round($_GET['antiAlias']);
		if($antiAlias==0){
			$antiAlias = FALSE;
		}
		else{
			$antiAlias = TRUE;
		}
		
		unset($imageFileName);
		$imageFileName = $_SESSION['imageFileName'.$imageID];
		unset($_SESSION['imageFileName'.$imageID]);
		
		unset($title);
		$title = $_SESSION['title'.$imageID];
		unset($_SESSION['title'.$imageID]);
		
		unset($legend);
		$legend = $_SESSION['legend'.$imageID];
		unset($_SESSION['legend'.$imageID]);
		
		unset($data);
		$data = $_SESSION['data'.$imageID];
		unset($_SESSION['data'.$imageID]);
		
		unset($color);
		if(isset($_SESSION['color'.$imageID])){
			$color = $_SESSION['color'.$imageID];
			unset($_SESSION['color'.$imageID]);
		}

		if(isset($color) && is_array($color)){
			for($k=0;$k<count($color);$k++){
				// on convertit en rvb et en objet 'Color'
				$color[$k] = hexa2rvb($color[$k]);
			}
			// si le tableau des couleurs n'est pas assez long on crée de nouvelles couleurs (dégradé)
			if(count($color)<count($data)){
				for($k=count($color);$k<count($data);$k++){
					$temp = $color[$k-1];
					$temp->brightness(20);
					$color[$k] = $temp;
				}
			}
		}
		else{
			// Jeu de couleurs par défaut
			$color = PIE_EARTH;
		}
		
		// Cherche le max pour explode
		$maxi = max($data);
		$indexMaxi = array_search($maxi,$data);
		
		// Crée graph (timeout de 5 minutes)
		$graph = new Graph($width,$height,$imageFileName,mktime(date('G'), date('i')+5, date('s'), date('n'), date('j'), date('Y')));
		$graph->setAntiAliasing($antiAlias);
		$graph->title->set($title);
		$plot = new Pie($data, $color);
		
		// Graph position et taille
		$plot->set3D(20);
		// Ne pas mettre de bordure lorsqu'une seule valeur est > 0 car ce sera 100% pour 1 seule valeur et la bordure bug...
		$nbSignificantValues = 0;
		for($k=0;$k<count($data);$k++){
			if($data[$k]>0){
				$nbSignificantValues++;
			}
			if($nbSignificantValues>1){
				break;
			}
		}
		if($nbSignificantValues>1){
			$plot->setBorderColor(new LightGray);
			$plot->setCenter(0.32, 0.52);
		}
		else{
			$plot->setCenter(0.34, 0.52);
		}
		$plot->setSize(0.62, 0.74);
		// Valeur mini pour générer un affichage du label
		$plot->setLabelMinimum(1);
		
		// Explode sur le maxi
		if(is_int($indexMaxi)){
			$plot->explode(array($indexMaxi => 30));
		}
		
		// Légende
		$plot->setLegend($legend);
		if($nbSignificantValues>1){
			$plot->legend->setPosition(1.58,0.47);
		}
		else{
			$plot->legend->setPosition(1.50,0.50);
		}
		$plot->legend->setPadding(10, 10, 10, 10);
		$plot->legend->setSpace(5);
		$plot->legend->shadow->setSize(2);
		$plot->legend->shadow->setPosition(4);
		
		// Labels sur le camembert
		$plot->setLabelPosition(-40);
		$plot->label->setFont(new Tuffy(9));
		$plot->label->setBackgroundColor(new White(55));
		$plot->label->border->setColor(new White(55));
		
		// Draw dans le fichier $imageFileName
		$graph->add($plot);
		$graph->draw(1);
		// On envoie un png très léger pour dire que l'image est générée
		header("Content-Type: image/png");
		echo file_get_contents('images/pixel.png');
		// sinon cette ligne envoie l'image générée :
		//echo file_get_contents($this->fileCache);
		
	break;
	
	
	/**************************************************************/
	
	
	case 2:
		// Lignes d'évolution sur une période
		require_once ("LinePlot.class.php");
		
		// Récupère les paramètres
		$imageID = round($_GET['imageID']);
		$width = round($_GET['width']);
		$height = round($_GET['height']);
		$antiAlias = round($_GET['antiAlias']);
		if($antiAlias==0){
			$antiAlias = FALSE;
		}
		else{
			$antiAlias = TRUE;
		}
		
		unset($imageFileName);
		$imageFileName = $_SESSION['imageFileName'.$imageID];
		unset($_SESSION['imageFileName'.$imageID]);
		
		unset($title);
		$title = $_SESSION['title'.$imageID];
		unset($_SESSION['title'.$imageID]);
		
		unset($legend);
		$legend = $_SESSION['legend'.$imageID];
		unset($_SESSION['legend'.$imageID]);
		
		unset($data);
		$data = $_SESSION['data'.$imageID];
		unset($_SESSION['data'.$imageID]);
		
		unset($color);
		if(isset($_SESSION['color'.$imageID])){
			$color = $_SESSION['color'.$imageID];
			unset($_SESSION['color'.$imageID]);
		}
		if(isset($color) && is_array($color)){
			reset($color);
			for($k=0;$k<count($color);$k++){
				$temp = each($color);
				// on convertit en rvb et en objet 'Color'
				$color[$temp[0]] = hexa2rvb($temp[1]);
			}
		}
		
		unset($lblAbs);
		if(isset($_SESSION['lblAbs'.$imageID])){
			$lblAbs = $_SESSION['lblAbs'.$imageID];
			unset($_SESSION['lblAbs'.$imageID]);
		}
		
		// Crée graph (timeout de 5 minutes)
		$graph = new Graph($width,$height,$imageFileName,mktime(date('G'), date('i')+5, date('s'), date('n'), date('j'), date('Y')));
		$graph->setAntiAliasing($antiAlias);
		$graph->title->set($title);
		
		// PlotGroup
		$group = new PlotGroup;
		$group->setXAxisZero(FALSE);
		$group->grid->setType(LINE_DASHED);
		$group->setBackgroundColor(new Color(197, 180, 210, 80));
		$group->setPadding(30, 20, 40, 100);
		
		// Axe gauche
		$group->axis->left->setTickStyle(TICK_IN);
		$group->axis->left->setLabelInterval(2);
		$group->axis->left->setLabelPrecision(0);
		$group->axis->left->label->move(-4, 0);
		
		// Axe du bas
		if(isset($lblAbs) && is_array($lblAbs)){
			$group->axis->bottom->setLabelText($lblAbs);
		}
		$group->axis->bottom->setTickStyle(TICK_OUT);
		$group->axis->bottom->label->move(0, 4);
		
		// LinePlot
		$maxi = 0;
		foreach($data as $key => $value){
			// Valeur maxi pour l'axe des ordonnée
			if(is_array($value)){
				$tmpMaxi = max($value);
				if($tmpMaxi > $maxi){
					$maxi = $tmpMaxi;
				}
			}
			
			$plot = new LinePlot($value);
			$plot->setThickness(3);
			// Axe des ordonnées
			$plot->yAxis->auto(false);
			// Les libelles des points sur la courbe
			$plot->label->set($value);
			$plot->label->move(0,-5);
			if(isset($color) && is_array($color)){
				// Couleur de la courbe
				$plot->setColor($color[$key]);
				// Couleur de fond des libelles
				$colorObj = $color[$key];
				$colorTemp = $colorObj->getColor();
				$plot->label->setBackgroundColor(new Color($colorTemp[0],$colorTemp[1],$colorTemp[2],70));
				// Couleur de remplissage sous la courbe
				if(count($data)<=2){
					$plot->setFillColor(new Color($colorTemp[0],$colorTemp[1],$colorTemp[2],80));
				}
			}
			// Legende
			$group->legend->add($plot, $legend[$key], LEGEND_LINE);
			// Ajoute la ligne
			$group->add($plot);
		}
		
		// Axe des ordonnées
		$group->setYMax($maxi+1);
		
		// Legende
		$group->legend->setModel(1);
		$nbColumns = ceil(count($legend)/2);
		if($nbColumns<1){
			$nbColumns = 1;
		}
		elseif($nbColumns>6){
			$nbColumns = 6;
		}
		$group->legend->setColumns($nbColumns);
		$group->legend->setSpace(10);
		$group->legend->setBackgroundColor(new Color(255, 255, 255));
		$group->legend->setPosition(0.98,0.90);
		$group->legend->shadow->setSize(2);
		$group->legend->shadow->setPosition(4);
		
		// Draw dans le fichier $imageFileName
		$graph->add($group);
		$graph->draw(1);
		// On envoie un png très léger pour dire que l'image est générée
		header("Content-Type: image/png");
		echo file_get_contents('images/pixel.png');
		// sinon cette ligne envoie l'image générée :
		//echo file_get_contents($this->fileCache);
		
	break;
}

// Convertion des couleurs hexa en rvb
function hexa2rvb($color){
	if(preg_match('`^#?([a-f0-9]{6})$`i',$color,$out)){ 
		$color="#".$out[1];
		$r = hexdec(substr($color, 1,2));
		$v = hexdec(substr($color, 3,2));
		$b = hexdec(substr($color, 5,2));
	}
	else{
		switch($color){
			case 'dodgerblue':
				$r = 30;
				$v = 144;
				$b = 255;
			break;
			
			case 'green':
				$r = 0;
				$v = 128;
				$b = 0;
			break;
			
			case 'beige':
				$r = 245;
				$v = 245;
				$b = 220;
			break;
			
			case 'red':
				$r = 255;
				$v = 0;
				$b = 0;
			break;
			
			case 'orange':
				$r = 255;
				$v = 165;
				$b = 0;
			break;
			
			case 'yellow':
				$r = 255;
				$v = 255;
				$b = 0;
			break;
			
			case 'olive':
				$r = 128;
				$v = 128;
				$b = 0;
			break;
			
			case 'brown':
				$r = 165;
				$v = 42;
				$b = 42;
			break;
			
			case 'violet':
				$r = 238;
				$v = 130;
				$b = 238;
			break;
			
			case 'pink':
				$r = 255;
				$v = 192;
				$b = 203;
			break;
			
			default:
				$r = 255;
				$v = 0;
				$b = 0;
			break;
		}
	}
	return new Color($r,$v,$b);
}
?>