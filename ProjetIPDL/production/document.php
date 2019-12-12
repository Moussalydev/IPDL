<?php 
	require_once("pdfClasse/class.ezpdf.php");
	$pdf = & new Cezpdf();
	$pdf-> ezText("Hello word !");
	$pdf-> ezStream();
 ?>