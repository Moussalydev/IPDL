<?php
// Activer le debug
$debug = false;

// Nombre total d'images générées
$imageCount = 0;

function insertStatImage($imageType,$width,$height,$title,$legend,$data,$color,$lblAbs=NULL,$antiAlias=TRUE){
	global $sid,$debug,$imageCount;
	$imageCount ++;
	
	// Détermination du nom de l'image
	$imageFileName = date('YmdHis').'_'.$imageCount.'.png';
	
	if(!$debug){
		// Tableau Javascript des images
		echo "\n"; ?>
		<script language="javascript">
		statImages[<?php echo $imageCount ?>] = '<?php echo $imageFileName ?>';
		</script><?php
	}

	$image = 'artichow-1.1.0/statistiques_genere_image.php';
	$image .= '?imageType='.$imageType;
	$image .= '&imageID='.$imageCount;
	$image .= '&width='.$width;
	$image .= '&height='.$height;
	$image .= '&antiAlias='.$antiAlias;
	
	$_SESSION['imageFileName'.$imageCount] = $imageFileName;
	$_SESSION['title'.$imageCount] = $title;
	$_SESSION['legend'.$imageCount] = $legend;
	$_SESSION['data'.$imageCount] = $data;
	if(is_array($color)){
		$_SESSION['color'.$imageCount] = $color;
	}
	if(is_array($lblAbs)){
		$_SESSION['lblAbs'.$imageCount] = $lblAbs;
	}
	
	echo '
	<center>';
	if(!$debug){
	echo '
	<div style="display:inline;width:'.$width.'px;height:'.$height.'px" id="divStatImageLoading'.$imageCount.'">
	<table width="'.$width.'" height="'.$height.'" cellpadding="0" cellspacing="0" style="border-color:#0000" border="1" bgcolor="#FFFFFF"><tr><td align="center" valign="middle">Chargement en cours...<br><br><img src="artichow-1.1.0/images/loading.gif"></td></tr></table>
	</div>
	<div style="display:none;width:'.$width.'px;height:'.$height.'px" id="divStatImage'.$imageCount.'">';
	}
	echo '
	<img src="'.$image.'" width="'.$width.'" height="'.$height.'" id="imageStatImage'.$imageCount.'">
	';
	if(!$debug){
	echo '</div>';
	}
	echo '
	</center>
	';
}

if(!$debug){
?>
<script language="javascript">
// Tableau Javascript des images
var statImages = new Array();

// Fonction de vérification du chargement des images
function checkStatImages(){
	// Au premier passage on initialise les variables
	if(nbPassages==0){
		nbTotalImagesStat = statImages.length - 1;
		for(i=1;i<=nbTotalImagesStat;i++){
			statImagesReplaced[i] = 'non';
		}
	}
	
	// On parcoure le tableau des images de stat
	for(i=1;i<=nbTotalImagesStat;i++){
		imageID = 'imageStatImage'+i;
		objImage = eval("document.getElementById('"+imageID+"')");
		if(objImage.complete == true){
			// l'image est chargée mais pas encore remplacée
			// (le script php signale qu'il a fini de générer l'image)
			// on redirige vers le png créé
			if(statImagesReplaced[i]=='non'){
				objImage.src = 'artichow-1.1.0/cache/'+statImages[i];
				statImagesReplaced[i] = 'oui';
			}
			// l'image est chargée (c'est le png)
			// on l'affiche, on le marque comme chargé
			else if(statImagesReplaced[i]=='oui'){
				document.getElementById('divStatImageLoading'+i).style.display = 'none';
				document.getElementById('divStatImage'+i).style.display = 'inline';
				statImagesReplaced[i] = 'chargee';
				nbLoadedImagesStat++;
			}
		}
	}
	nbPassages++;
	
	// Tests pour savoir si il faut continuer de vérifier le chargement
	//alert('nbPassages = '+nbPassages+'\nnbTotalImagesStat = '+nbTotalImagesStat+'\nnbLoadedImagesStat = '+nbLoadedImagesStat );
	if( (nbLoadedImagesStat == nbTotalImagesStat && nbLoadedImagesStat != 0) || (nbLoadedImagesStat == nbTotalImagesStat && nbLoadedImagesStat == 0 && nbPassages > 10) || (nbPassages > 600) ){
		<?php
		// Permet de lancer un traitement lorsque toutes les images sont chargées...
		if(isset($checkStatImagesOnAllComplete)){
			echo $checkStatImagesOnAllComplete;
		}
		?>
		return true;
	}
	else{
		setTimeout('checkStatImages();',500);
	}
}

nbPassages = 0;
nbLoadedImagesStat = 0;
var statImagesReplaced = new Array();
window.onLoad = setTimeout('checkStatImages();',500);
</script>
<?php
}
?>