<?php

try {
	     $db = new PDO ('mysql:host=localhost;dbname=statistiques','root','');
	    } catch (Exception $e) {
	      die('Erreur :'.$e->getMessage());
	    }
require_once 'PHPExcel\Classes\PHPExcel\IOFactory.php';


if( isset($_GET['upload']) ) // si formulaire soumis
{ 
    $content_dir = 'upload/'; // dossier où sera déplacé le fichier
    var_dump($_FILES['fichier']['tmp_name']);
    $tmp_file = $_FILES['fichier']['tmp_name'];

    if( !is_uploaded_file($tmp_file) )
    {
        exit("Le fichier est introuvable");
    }

    // on vérifie maintenant l'extension
    $type_file = $_FILES['fichier']['type'];

    if( !strstr($type_file, 'xls') && !strstr($type_file, 'xlsx') && !strstr($type_file, 'bmp') && !strstr($type_file, 'csv') )
    {
        exit("Le fichier n'est pas une image");
    }

    // on copie le fichier dans le dossier de destination
    $name_file = $_FILES['fichier']['name'];

    if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
    {
        exit("Impossible de copier le fichier dans $content_dir");
    }

    $json = "Le fichier a bien été uploadé";
     print_r(json_encode($json));

	    error_reporting(E_ALL);


	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	$objPHPExcel = PHPExcel_IOFactory::load($name_file);
	$sheet = $objPHPExcel->getActiveSheet();

	//print_r($sheet);

	foreach($sheet->getRowIterator() as $row) {
	  $sql= 'CREATE TABLE IF NOT EXISTS `statistique` (' . "\n";
	  $sql.= ' `ident` int(11) NOT NULL AUTO_INCREMENT,' . "\n";
	  foreach($row->getCellIterator() as $key => $cell){
	    if(1 == $row->getRowIndex ()) {
	      $sql.= ' `'.utf8_decode($cell->getCalculatedValue()).'` varchar(255) COLLATE utf8_unicode_ci NOT NULL,' . "\n";
	    }
	  }
	  $sql.= ' PRIMARY KEY (`ident`)' . "\n";
	  $sql.= ")\nENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1;";
	$req = $db->query($sql);

	 $j=0;
	 
	      foreach($sheet->getRowIterator() as $ligne) {
	      	$j++;

	        $tableau = array();$i=0;
	         //Une collection qui recupere chaque ligne du fichier Excel
	        //Et le met dans la variable collection tableau
	        foreach ($ligne->getCellIterator() as $colonne) {
	          $tableau[] = utf8_decode($colonne->getValue()); 
	          //echo $colonne->getValue()." ";
	          //echo $tableau[$i]." ".$i;
	         // utf8_decode($cell->getCalculatedValue())
	          $i++;
	        }
	        if($j>1){
	        $sql = "INSERT INTO `statistique` VALUES ('$tableau[0]','$tableau[1]','$tableau[2]','$tableau[3]','$tableau[4]','$tableau[5]','$tableau[6]','$tableau[7]','$tableau[8]','$tableau[9]','$tableau[10]','$tableau[11]','$tableau[12]','$tableau[12]','$tableau[13]','$tableau[14]','$tableau[15]','$tableau[1]','$tableau[17]','$tableau[18]','$tableau[19]','$tableau[20]','$tableau[21]','$tableau[22]','$tableau[23]','$tableau[24]','$tableau[25]','$tableau[26]','$tableau[27]')";
	        $req = $db->query($sql);
	      }

	        //Insérer les données dans la base de données
	        
	        }
	  exit;
	}

}
?>
