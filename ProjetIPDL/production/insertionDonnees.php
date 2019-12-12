<!DOCTYPE html>
<html>
<head >
    <meta charset="utf-8">
    <title></title>
</head>
<body>
<?php
error_reporting(E_ALL);
  try {
       $db = new PDO ('mysql:host=localhost;dbname=tester','root','');
      } catch (Exception $e) {
        die('Erreur :'.$e->getMessage());
      }
require_once 'PHPExcel\Classes\PHPExcel\IOFactory.php';
 
// Chargement du fichier Excel
//$objPHPExcel = PHPExcel_IOFactory::load("DGI.xls");
 

error_reporting(E_ALL);

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objPHPExcel = PHPExcel_IOFactory::load("DGI2016.xls");
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
 
      foreach($sheet->getRowIterator() as $ligne) {$j++;

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
?>
</body>
</html>