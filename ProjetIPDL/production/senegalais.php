<?php 

	require_once('connect_db.php');
	if(isset($_POST['formation']) && isset($_POST['Nationalite'])){

		$resultat=$db->query("select Nationalite, count('ID')as effectif from a Group By formation");
			$json=array();
			$i=0;
			while ($donnee=$resultat->fetch(PDO::FETCH_ASSOC)) {
					$json[$i] = $donnee;
		   		$i++;
		    } 
		    print_r(json_encode($json));
	}
 ?>